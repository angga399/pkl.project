@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Riwayat Absen untuk: {{ $daftarhdr->tipe }} - {{ $daftarhdr->hari }}</h2>
    <p><strong>Tanggal:</strong> {{ $daftarhdr->tanggal->format('d-m-Y') }}</p>

    <h3>Histori Absen</h3>
    
    @if($histories->isEmpty())
        <p>Tidak ada riwayat absen untuk entri ini.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Gambar</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($histories as $history)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $history->tanggal->format('d-m-Y') }}</td>
                        <td>{{ $history->latitude }}</td>
                        <td>{{ $history->longitude }}</td>
                        <td>
                            @if($history->data_gambar)
                                <img src="data:image/png;base64,{{ $history->data_gambar }}" alt="Gambar Absen" width="100">
                            @else
                                <p>Tidak ada gambar</p>
                            @endif
                        </td>
                        <td>{{ $history->catatan ?? 'Tidak ada catatan' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
