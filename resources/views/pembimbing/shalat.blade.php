<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembimbing PKL</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto">
        <h1 class="text-center text-3xl font-bold my-6">Jurnal yang Menunggu Persetujuan</h1>
        
        @foreach ($journals as $journal)
        <section class="text-gray-600 body-font mb-6">
            <div class="container mx-auto flex flex-col items-center">
                <div class="flex flex-col sm:flex-row w-full max-w-4xl bg-white shadow-lg rounded-lg p-6">
                    <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
                        <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">{{ $journal->nama }}</h2>
                        <p class="text-base">{{ $shalat->tanggal }}</p>
                        <p class="leading-relaxed text-lg mb-4">{{ $journal->uraian_konsentrasi }}</p>

                        <!-- Status Jurnal -->
                        <p class="text-sm text-gray-500 mb-4">
                            <strong>Status: </strong>
                            @if($journal->status == 'Disetujui')
                                <span class="text-green-500">Disetujui</span>
                            @elseif($journal->status == 'Ditolak')
                                <span class="text-red-500">Ditolak</span>
                            @else
                                <span class="text-yellow-500">Menunggu</span>
                            @endif
                        </p>

                        <!-- Tombol Setuju dan Tolak -->
                        @if($journal->status == 'Menunggu')
                        <form action="{{ route('pembimbing.setuju', $journal->id) }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">Setuju</button>
</form>

<form action="{{ route('pembimbing.tolak', $journal->id) }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600">Tolak</button>
</form>

                        @endif
                    </div>
                </div>
            </div>
        </section>
        @endforeach
    </div>
</body>
</html>
