@extends('layouts.app')

@section('content')

<div class="section-video">
    <div class="video-wrapper">

        <!-- VIDEO -->
        <video controls>
            <source src="{{ asset('videos/cerita.mp4') }}" type="video/mp4">
        </video>

        <!-- TEKS -->
        <div class="video-text">
            <h2>Cerita di Balik Cita Rasa</h2>
            <p>
                Setiap masakan dimasak menggunakan anglo dan arang,
                menghadirkan aroma khas dan rasa autentik Bakmi Jowo.
            </p>
        </div>

    </div>
</div>

@endsection
