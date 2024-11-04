<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    // Tampilkan Daftar Agenda
    public function index(Request $request)
    {
        $id = $request->user()->id;
        if($id){
            $agendas = Agenda::where('user_id', $id)->orderBy('tanggal_kegiatan', 'asc')->orderBy('time_start', 'asc')->get();
        } else {
            $agenda = Agenda::all();
        }
        // Mengirim data agenda ke view index.blade.php
        return view('agenda.index', compact('agendas'));
    }
    
    
    public function myAgenda(Request $request)
    {
        $id = $request->user()->id;

        $agendas = Agenda::where('user_id', $id)->orderBy('tanggal_kegiatan', 'asc')->get();
        return view('agenda.myagenda', compact('agendas'));
    }
    
    // Tampilkan form tambah agenda
    public function create()
    {
        $agendas = Agenda::all();
        return view('agenda.form', compact('agendas')); // Menampilkan halaman form
        
    }
    
    // Simpan agenda baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi_singkat' => 'required|string|max:1000',
            'tanggal_kegiatan' => 'required|date',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'time_start' => 'required|date_format:H:i',
            'time_end' => 'required|date_format:H:i',
        ]);

        // dd($request->all());
        Agenda::create($request->all());
        return redirect()->route('agenda.index')
                         ->with('success', 'Agenda berhasil ditambahkan.')
                         ->with('type', 'store');
    }
      

      // Tampilkan form edit agenda
    public function edit($id)
    {
        $agendas = Agenda::all();
        $edit = Agenda::FindOrFail($id);
        // dd($agendas);
        return view('agenda.edit', compact('agendas', 'edit'))
                    ->with('type', 'update');
    }

    // Update data agenda
    public function  update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi_singkat' => 'required|string|max:1000',
            'tanggal_kegiatan' => 'required|date',
            'time_start' => 'required',
            'time_end' => 'required',
        ]);

        $agendas= Agenda::findOrFail($id);
        $agendas->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'tanggal_kegiatan' => Carbon::parse($request->tanggal_kegiatan),
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'is_done' => $request->has('is_done') ? true : false
        ]);


       return redirect()->route('agenda.index')
                        ->with('success', 'Agenda berhasil diperbarui.')
                        ->with('type', 'update');
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

}

