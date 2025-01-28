<form action="{{ route('dftrshalats.store') }}" method="POST">
    @csrf

    <div class="mb-4">
        <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis Shalat</label>
        <input type="text" id="jenis" name="jenis" class="w-full border border-gray-300 rounded-md p-2" readonly>
    </div>

    <div class="mb-4">
        <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
        <input type="date" id="tanggal" name="tanggal" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="w-full border border-gray-300 rounded-md p-2" readonly>
    </div>

    <div class="mb-4">
        <label for="hari" class="block text-sm font-medium text-gray-700">Hari</label>
        <input type="text" id="hari" name="hari" value="{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd') }}" class="w-full border border-gray-300 rounded-md p-2" readonly>
    </div>

    <div class="mb-4">
        <label for="waktu" class="block text-sm font-medium text-gray-700">Waktu Shalat</label>
        <input type="time" id="waktu" name="waktu" class="w-full border border-gray-300 rounded-md p-2" readonly>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan</button>
</form>

<script>
    function updateRealTime() {
        // Mendapatkan elemen input waktu
        const waktuInput = document.getElementById('waktu');
        const jenisInput = document.getElementById('jenis');
        
        // Mendapatkan waktu saat ini
        const now = new Date();
        
        // Format waktu ke dalam format yang sesuai (hh:mm)
        let hours = now.getHours().toString().padStart(2, '0');
        let minutes = now.getMinutes().toString().padStart(2, '0');
        
        // Mengupdate input waktu
        waktuInput.value = hours + ':' + minutes;

        // Tentukan jenis shalat berdasarkan waktu
        let jenisShalat = '';
        
        if (hours >= 4 && hours < 5) {
            jenisShalat = 'Subuh';
        } else if (hours >= 12 && hours < 15) {
            jenisShalat = 'Dzuhur';
        } else if (hours >= 15 && hours < 18) {
            jenisShalat = 'Ashar';
        } else if (hours >= 18 && hours < 19) {
            jenisShalat = 'Maghrib';
        } else if (hours >= 19 && hours < 20) {
            jenisShalat = 'Isya';
        } else {
            jenisShalat = 'Duha';  // Waktu shalat duha (pagi sebelum dzuhur)
        }

        // Mengupdate input jenis shalat
        jenisInput.value = jenisShalat;
    }

    // Memperbarui waktu setiap detik
    setInterval(updateRealTime, 1000);

    // Panggil sekali saat pertama kali dimuat
    updateRealTime();
</script>
