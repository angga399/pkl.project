<!-- resources/views/daftarhdr/show.blade.php -->

@extends('layouts.app') <!-- Assuming you have a main layout -->

@section('content')
<div class="container">
    <h1>Detail Daftarhdr</h1>

    <div class="card">
        <div class="card-header">
            <h3>Daftarhdr #{{ $daftarhdr->id }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Hari:</strong> {{ $daftarhdr->hari }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($daftarhdr->tanggal)->format('d F Y') }}</p>
            <p><strong>Tipe:</strong> {{ $daftarhdr->tipe }}</p>
            <p><strong>Latitude:</strong> {{ $daftarhdr->latitude }}</p>
            <p><strong>Longitude:</strong> {{ $daftarhdr->longitude }}</p>

            @if($daftarhdr->dataGambar)
                <p><strong>Gambar:</strong></p>
                <img src="{{ $daftarhdr->dataGambar }}" alt="Gambar" class="img-fluid" />
            @endif

            <p><strong>Notes:</strong> {{ $daftarhdr->notes ?? 'No notes provided.' }}</p>

            <!-- Button to go back -->
            <a href="{{ route('daftarhdr.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection
