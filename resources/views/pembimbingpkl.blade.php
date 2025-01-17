@vite('resources/css/app.css')

<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-20">
          <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">HALAMAN PEMBIMBIMNG</h1>
        <h2 class="text-xs text-indigo-500 tracking-widest font-medium title-font mb-1">MOHON ISI KEGIATAN MURID-MURID PKL</h2>
      </div>
      <div class="flex flex-wrap -m-4">
        <div class="p-4 md:w-1/3">
          <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
            <div class="flex items-center mb-3">
              <div class="w-7  h-7 mr-3 inline-flex items-center justify-center rounded-full  text-white flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <img class=""  src="image/jj.png" alt="icon ">
                </svg>
              </div>
              <h2 class="text-gray-900 text-lg title-font font-medium">absensi kehadiran siswa</h2>
            </div>
            <div class="flex-grow">
              <p class="leading-relaxed text-base">isi absen kehadiran siswa</p>
              <a class="mt-3 text-indigo-400 inline-flex items-center hover:text-indigo-600 transition-all duration-300" href="{{ route('pembimbing.approvals') }}">Go Page
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                  <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="p-4 md:w-1/3">
          <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
            <div class="flex items-center mb-3">
              <div class="w-7 h-7 mr-3 inline-flex items-center justify-center rounded-lg  text-white flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <img class=""  src="image/bee.png" alt="icon "><circle cx="12" cy="7" r="4"></circle>
                </svg>
              </div>
              <h2 class="text-gray-900 text-lg title-font font-medium" >praktik kerja lapangan</h2>
            </div>
            <div class="flex-grow">
              <p class="leading-relaxed text-base">isi absen kehadiran siswa</p>
              <a class="mt-3 text-indigo-400 inline-flex items-center hover:text-indigo-600 transition-all duration-300" href="{{ route('pembimbing.journals') }}">Go Page
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                  <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="p-4 md:w-1/3">
          <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
            <div class="flex items-center mb-3">
              <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-md text-white flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <circle cx="6" cy="6" r="3"></circle>
                  <circle cx="6" cy="18" r="3"></circle>
                  <img class=""  src="image/me.png" alt="icon "><circle cx="12" cy="7" r="4"></circle>
                </svg>
              </div>
              <h2 class="text-gray-900 text-lg title-font font-medium">absensi shalat</h2>
            </div>
            <div class="flex-grow">
              <p class="leading-relaxed text-base">isi absen shalat siswa</p>
              <a class="mt-3 text-indigo-400 inline-flex items-center hover:text-indigo-600 transition-all duration-300" href="{{ route('pembimbing.shalat') }}">Go Page
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