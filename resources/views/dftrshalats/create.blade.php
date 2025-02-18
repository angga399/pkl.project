<form action="{{ route('dftrshalats.store') }}" method="POST" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
    @csrf

    <div class="mb-4">
        <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis Shalat</label>
        <input type="text" id="jenis" name="jenis" class="w-full border border-gray-300 rounded-md p-2 bg-gray-100" readonly>
    </div>

    <div class="mb-4">
        <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
        <input type="date" id="tanggal" name="tanggal" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="w-full border border-gray-300 rounded-md p-2 bg-gray-100" readonly>
    </div>

    <div class="mb-4">
        <label for="hari" class="block text-sm font-medium text-gray-700">Hari</label>
        <input type="text" id="hari" name="hari" value="{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd') }}" class="w-full border border-gray-300 rounded-md p-2 bg-gray-100" readonly>
    </div>

    <div class="mb-4">
        <label for="waktu" class="block text-sm font-medium text-gray-700">Waktu Shalat</label>
        <input type="time" id="waktu" name="waktu" class="w-full border border-gray-300 rounded-md p-2 bg-gray-100" readonly>
    </div>

    <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-200">
        Simpan
    </button>
</form>

<script>
    function updateRealTime() {
        const waktuInput = document.getElementById('waktu');
        const jenisInput = document.getElementById('jenis');
        
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        
        waktuInput.value = `${hours}:${minutes}`;

        let jenisShalat = 'Duha'; // Default jika di luar waktu utama

        if (hours >= 4 && hours < 5) jenisShalat = 'Subuh';
        else if (hours >= 12 && hours < 15) jenisShalat = 'Dzuhur';
        else if (hours >= 15 && hours < 18) jenisShalat = 'Ashar';
        else if (hours >= 18 && hours < 19) jenisShalat = 'Maghrib';
        else if (hours >= 19 && hours < 20) jenisShalat = 'Isya';

        jenisInput.value = jenisShalat;
        requestAnimationFrame(updateRealTime);
    }

    updateRealTime();
</script>
