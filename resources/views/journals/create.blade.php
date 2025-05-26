<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jurnal</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <!-- Pesan Error -->
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative max-w-md mx-auto mt-6" role="alert">
            <strong class="font-bold">Oops!</strong>
            <span class="block sm:inline">Ada masalah dengan input Anda.</span>
            <ul class="mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulir Tambah Jurnal -->
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Isi Jurnal PKL!</h1>
            </div>
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <form action="{{ route('journals.store') }}" method="POST">
                    @csrf
                    <div class="flex flex-wrap -m-2">
                        <!-- Nama -->
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="nama" class="leading-7 text-sm text-gray-600">Nama</label>
                                <input type="text" id="nama" name="nama" value="{{ Auth::user()->full_name }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" readonly>
                            </div>
                        </div>
        
                        <!-- Kelas -->
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="kelas" class="leading-7 text-sm text-gray-600">Kelas</label>
                                <input type="text" id="kelas" name="kelas" value="{{ Auth::user()->major }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" readonly>
                            </div>
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="PT" class="leading-7 text-sm text-gray-600">perusahaan</label>
                                <input type="text" id="PT" name="PT" value="{{ Auth::user()->company_id }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" readonly>
                            </div>
                        </div>

                        <!-- Tanggal -->
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="tanggal" class="leading-7 text-sm text-gray-600">Tanggal</label>
                                <input type="date" id="tanggal" name="tanggal" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="w-full border border-gray-300 rounded-md p-2" readonly>
                            </div>
                        </div>
                        <!-- Uraian Konsentrasi -->
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="uraian_konsentrasi" class="leading-7 text-sm text-gray-600">Uraian Konsentrasi</label>
                                <textarea id="uraian_konsentrasi" name="uraian_konsentrasi" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" required></textarea>
                            </div>
                        </div>
                        <!-- Tombol Simpan -->
                        <div class="p-2 w-full">
                            <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

</body>
</html>
