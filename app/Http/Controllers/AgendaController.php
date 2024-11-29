<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AgendaController extends Controller
{
    // Tampilkan Daftar Agenda
    public function index(Request $request)
    {   
        $userId = $request->user()->id; // Mendapatkan user ID yang login
        $keyword = $request->input('search'); // Mendapatkan query pencarian
    
        if ($userId) {
            // Query agenda berdasarkan user_id dan keyword (jika ada)
            $agendas = Agenda::where('user_id', $userId)
                ->when($keyword, function ($query, $keyword) {
                    $query->where(function ($query) use ($keyword) {
                        $query->where('nama_kegiatan', 'like', '%' . $keyword . '%')
                              ->orWhere('deskripsi_singkat', 'like', '%' . $keyword . '%');
                    });
                })
                ->orderBy('tanggal_kegiatan', 'asc')
                ->orderBy('time_start', 'asc')
                ->get();
    
            // Menghitung jumlah notifikasi berdasarkan agenda
            $unreadCount = $agendas->count();
    
        } else {
            // Jika user_id tidak ditemukan, menampilkan semua agenda
            $agendas = Agenda::all();
            $unreadCount = $agendas->count();
        }
    
        // Mengirim data agenda ke view index.blade.php
        return view('agenda.index', compact('agendas', 'unreadCount'));
    }
    
    public function myAgenda(Request $request)
    {
        $id = $request->user()->id;
        if($id){
            $agendas = Agenda::where('user_id', $id)
                             ->orderBy('tanggal_kegiatan', 'asc')
                             ->orderBy('time_start', 'asc')
                             ->get();

         // Menghitung jumlah Notifikasi
         $unreadCount = $agendas->count();

        } else {
            $agendas = Agenda::all();
            $unreadCount = $agendas->count();
        }
        return view('agenda.myagenda', compact('agendas', 'unreadCount'));
    }
    
    // Tampilkan form tambah agenda
    public function create(Request $request)
    {
        $agendas = Agenda::all();
        $id = $request->user()->id;
        if($id){
            $agendas = Agenda::where('user_id', $id)
                             ->orderBy('tanggal_kegiatan', 'asc')
                             ->orderBy('time_start', 'asc')
                             ->get();

         // Menghitung jumlah agenda Notifikasi
         $unreadCount = $agendas->count();

        } else {
            $agendas = Agenda::all();
            $unreadCount = $agendas->count();
        }
        return view('agenda.form', compact('agendas', 'unreadCount')); // Menampilkan halaman form
        
    }
    
    // Simpan agenda baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi_singkat' => 'required|string|max:1000',
            'tanggal_kegiatan' => 'required|date',
            'activity_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
            'time_start' => 'required|date_format:H:i',
            'time_end' => 'required|date_format:H:i',
        ]);

        $data = $request->all();

        if ($request->hasFile('activity_picture')) {
            $data['activity_picture'] = $request->file('activity_picture')
                                                ->store('activities', 'public');
        }

        // dd($request->all());
        // Agenda::create($request->all());
        Agenda::create($data);
        return redirect()->route('agenda.index')
                         ->with('success', 'Agenda berhasil ditambahkan.')
                         ->with('type', 'store');
    }
      

      // Tampilkan form edit agenda
    public function edit(Request $request, $id)
    {
        $agendas = Agenda::all();
        $unreadCount = $agendas->count();
        $edit = Agenda::FindOrFail($id);
        $id = $request->user()->id;
        if($id){
            $agendas = Agenda::where('user_id', $id)
                             ->orderBy('tanggal_kegiatan', 'asc')
                             ->orderBy('time_start', 'asc')
                             ->get();

         // Menghitung jumlah Notifikasi
         $unreadCount = $agendas->count();

        } else {
            $agendas = Agenda::all();
            $unreadCount = $agendas->count();
        }
        
        // dd($agendas);
        return view('agenda.edit', compact('agendas', 'edit', 'unreadCount'))
                    ->with('type', 'update');
    }

    // Update data agenda
    public function  update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi_singkat' => 'required|string|max:1000',
            'tanggal_kegiatan' => 'required|date',
            'activity_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
            'time_start' => 'required',
            'time_end' => 'required',
        ]);

        $agendas= Agenda::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('activity_picture')) {
            if ($agendas->activity_picture) {
                Storage::disk('public')->delete($agendas->activity_picture);
            }
            $data['activity_picture'] = $request->file('activity_picture')->store('activities', 'public');
        }
    
        $agendas->update($data);
    
        $request->merge([
            'is_done' => $request->has('is_done') ? 1 : 0,
        ]);
        
       $unreadCount = $agendas->count(); 
       return redirect()->route('agenda.index')
                        ->with('success', 'Agenda berhasil diperbarui.')
                        ->with('type', 'update')
                        ->with('unreadCount', $unreadCount);
    }
      
    public function updateStatus($id)
    {
        $agenda = Agenda::findOrFail($id);
        
        // Ubah status menjadi "Selesai"
        $agenda->is_done = true;
        $agenda->save();
    
        return response()->json(['success' => true, 'message' => 'Status agenda berhasil diperbarui.']);
    }
    
    // Hapus agenda
    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();
        
        return redirect()->action([AgendaController::class, 'index'])
                        ->with('success', 'Agenda berhasil dihapus.')
                        ->with('type', 'delete');
    }
    

    //Calendar

    public function calendar(Request $request)
    {
        $id = $request->user()->id;
        if($id) {
            $agendas = Agenda::where('user_id', $id) // Filter berdasarkan user yang login
                            ->orderBy('tanggal_kegiatan', 'asc')
                            ->orderBy('time_start', 'asc')
                            ->get();

            // Menghitung jumlah agenda Notifikasi
            $unreadCount = $agendas->count();
        } else {
            // Jika tidak ada user yang login, ambil seluruh agenda
            $agendas = Agenda::all();
            $unreadCount = $agendas->count();
        }

        // Memastikan hanya agenda milik user yang login yang ditampilkan di kalender
        $agendas = $agendas->map(function ($agenda) {
            return [
                'title' => $agenda->nama_kegiatan,
                'start' => $agenda->tanggal_kegiatan . 'T' . $agenda->time_start, // Gabungkan dengan waktu mulai
                'id' => $agenda->id,
            ];
        });

        return view('agenda.calendar',  compact('agendas', 'unreadCount'));
    }


    public function storeFromCalendar(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi_singkat' => 'required|string|max:1000',
            'tanggal_kegiatan' => 'required|date',
            'time_start' => 'required|date_format:H:i',
            'time_end' => 'required|date_format:H:i',
            'activity_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('activity_picture')) {
            $data['activity_picture'] = $request->file('activity_picture')->store('activities', 'public');
        }
    
        Agenda::create($data);
    
        return response()->json(['success' => true, 'message' => 'Agenda berhasil ditambahkan!']);
    }
    
}


