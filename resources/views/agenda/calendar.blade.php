<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendar</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/images/web.png" />
    <!-- Calendar -->
    <link href="{{asset('css/calendar.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    <style>
        /* Ubah warna latar belakang kolom hari menjadi hitam */
        .fc-day-header {
            background-color: black;
            color: white; /* Warna teks menjadi putih */
        }

        /* Ubah warna teks pada hari aktif (saat ini) */
        .fc-day-today {
            background-color: black;
            color: white;
        }

        /* Ubah warna latar belakang pada grid hari saat ini */
        .fc-day {
            color: black; /* Mengatur warna teks menjadi hitam pada hari */
        }

        /* Ubah warna teks pada hari yang memiliki agenda (Sematan) jika diinginkan */
        .fc-day[data-event=true] {
            background-color: rgb(0, 0, 0);
            color: white;
        }

    </style>
</head>
<body>
    <div id="calendar"></div>
    <div>
        <a href="{{ route('agenda.index') }}" class="btn-custom">Back To menu</a>
    </div>
    <script>  
        // Kirim data dari Blade ke JavaScript
        const calendarEvents = @json($agendas);
        const authUserId = "{{ Auth::id() }}";
        const csrfToken = "{{ csrf_token() }}";
        const calendarStoreUrl = "{{ route('agenda.calendar.store') }}";
    </script> 
    
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/calendar.js') }}"></script> <!-- Panggil Script Eksternal -->
</body>
</html>



