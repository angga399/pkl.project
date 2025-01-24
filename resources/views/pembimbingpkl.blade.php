<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pembimbing</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #0a192f, #1c1c1c); /* Gradasi dari biru tua ke hitam */
            color: white; /* Pastikan teks kontras dengan latar belakang */
        }
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
            background: linear-gradient(to right, #001b42, #0a192f); /* Gradasi latar belakang kartu */
            color: black; /* Teks dalam kartu berwarna hitam */
            border: 2px solid #00f2ff; /* Menambahkan border pada kartu */
            border-radius: 10px; /* Membuat sudut border melengkung */
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .icon {
            width: 50px;
            height: 50px;
            margin-right: 15px;
        }
    </style>
</head>
<body>
<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-20">
            <h1 class="sm:text-3xl text-2xl font-medium title-font text-stone-50">HALAMAN PEMBIMBIMBING</h1>
            <h2 class="text-xs text-stone-50 tracking-widest font-medium title-font mb-1">MOHON ISI KEGIATAN MURID-MURID PKL</h2>
        </div>
        <div class="flex flex-wrap -m-4">
            <div class="p-4 md:w-1/3">
                <div class="flex rounded-lg h-full p-8 flex-col card">
                    <div class="flex items-center mb-3">
                        <img src="image/jj.png" alt="icon" class="icon">
                        <h2 class="text-cyan-400 text-lg title-font font-medium ">Absensi Kehadiran Siswa</h2>
                    </div>
                    <div class="flex-grow">
                        <p class="leading-relaxed text-base text-cyan-400">Isi absen kehadiran siswa</p>
                        <a class="mt-3 text-indigo-400 inline-flex items-center hover:text-indigo-600 transition-all duration-300" href="{{ route('pembimbing.approvals') }}">
                            Go Page
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="p-4 md:w-1/3">
                <div class="flex rounded-lg h-full p-8 flex-col card">
                    <div class="flex items-center mb-3">
                        <img src="image/bee.png" alt="icon" class="icon">
                        <h2 class="text-cyan-400 text-lg title-font font-medium">Praktik Kerja Lapangan</h2>
                    </div>
                    <div class="flex-grow">
                        <p class="leading-relaxed text-base text-cyan-400">Isi absen kehadiran siswa</p>
                        <a class="mt-3 text-indigo-400 inline-flex items-center hover:text-indigo-600 transition-all duration-300" href="{{ route('pembimbing.journals') }}">
                            Go Page
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="p-4 md:w-1/3">
                <div class="flex rounded-lg h-full p-8 flex-col card">
                    <div class="flex items-center mb-3">
                        <img src="image/com.png" alt="icon" class="icon">
                        <h2 class="text-cyan-400 text-lg title-font font-medium">Absensi Shalat</h2>
                    </div>
                    <div class="flex-grow">
                        <p class="leading-relaxed text-base text-cyan-400">Isi absen shalat siswa</p>
                        <a class="mt-3 text-indigo-400 inline-flex items-center hover:text-indigo-600 transition-all duration-300" href="{{ route('pembimbing.shalat') }}">
                            Go Page
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>