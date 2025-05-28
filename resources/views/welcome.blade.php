<!-- resources/views/welcome.blade.php -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  @vite('resources/css/app.css')
  <!-- Load Pusher JS -->
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <style>
      .fade-out {
          opacity: 0;
          transition: opacity 0.5s ease-in-out;
      }
      
      .card-hover {
          transition: all 0.3s ease;
      }
      
      .card-hover:hover {
          transform: translateY(-10px);
          box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2), 0 10px 10px -5px rgba(0, 0, 0, 0.1);
      }
      
      .gradient-text {
          background: linear-gradient(45deg, #60A5FA, #34D399);
          -webkit-background-clip: text;
          background-clip: text;
          color: transparent;
          animation: gradient 3s ease infinite;
      }
      
      @keyframes gradient {
          0% { background-position: 0% 50%; }
          50% { background-position: 100% 50%; }
          100% { background-position: 0% 50%; }
      }
      
      .floating {
          animation: floating 3s ease-in-out infinite;
      }
      
      @keyframes floating {
          0% { transform: translateY(0px); }
          50% { transform: translateY(-10px); }
          100% { transform: translateY(0px); }
      }

      /* Notification Styles */
      #notificationDropdown {
          transform: translateY(10px);
          opacity: 0;
          transition: all 0.3s ease;
          pointer-events: none;
      }
      
      #notificationDropdown.show {
          transform: translateY(0);
          opacity: 1;
          pointer-events: auto;
      }
      
      #notificationToast {
          transform: translateX(100%);
          transition: all 0.3s ease;
      }
      
      #notificationToast.show {
          transform: translateX(0);
      }
      
      /* Bell shake animation */
      @keyframes shake {
          0% { transform: rotate(0deg); }
          25% { transform: rotate(15deg); }
          50% { transform: rotate(-15deg); }
          75% { transform: rotate(15deg); }
          100% { transform: rotate(0deg); }
      }
      
      .bell-shake {
          animation: shake 0.5s ease-in-out;
      }
  </style>
</head>

<body class="bg-gradient-to-br from-gray-900 via-blue-900 to-purple-900 text-white">
    <x-navigasi></x-navigasi>
  {{-- <!-- Notification Bell and Dropdown -->
  <div class="fixed top-4 right-4 z-50">
      <div class="relative">
          <button id="notificationButton" class="p-2 rounded-full bg-white/20 hover:bg-white/30 transition">
              <i class="fas fa-bell text-xl"></i>
              <span id="notificationCount" class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs font-bold hidden">0</span>
          </button>
          
          <div id="notificationDropdown" class="hidden absolute right-0 mt-2 w-72 bg-gray-800 rounded-lg shadow-lg border border-gray-700 py-1 z-50">
              <div class="px-4 py-2 border-b border-gray-700 font-semibold">Notifikasi</div>
              <div id="notificationList" class="max-h-60 overflow-y-auto">
                  <div class="px-4 py-3 text-center text-gray-400">Tidak ada notifikasi baru</div>
              </div>
              <a href="#" class="block px-4 py-2 text-sm text-center text-blue-400 hover:bg-gray-700">Lihat Semua</a>
          </div>
      </div>
  </div>

  <!-- Notification Toast -->
  <div id="notificationToast" class="fixed bottom-4 right-4 z-50 hidden">
      <div class="bg-gray-800 border-l-4 border-blue-500 text-white px-6 py-4 shadow-lg rounded-lg max-w-xs">
          <div class="flex items-center">
              <div id="toastIcon" class="mr-3">
                  <i class="fas fa-info-circle text-blue-400"></i>
              </div>
              <div>
                  <p id="toastMessage" class="text-sm"></p>
              </div>
              <button onclick="hideToast()" class="ml-4 text-gray-400 hover:text-white">
                  <i class="fas fa-times"></i>
              </button>
          </div>
      </div>
  </div> --}}

  <div class="min-h-screen flex flex-col justify-center items-center relative overflow-hidden">
      <!-- Background decoration -->
      <div class="absolute inset-0 overflow-hidden pointer-events-none">
          <div class="absolute w-64 h-64 rounded-full bg-blue-500 opacity-10 -top-20 -left-20"></div>
          <div class="absolute w-96 h-96 rounded-full bg-purple-500 opacity-10 -bottom-32 -right-32"></div>
      </div>

      <section class="text-gray-600 body-font py-24 w-full relative z-10">
          <div class="container px-5 mx-auto text-center">
              <h1 class="sm:text-6xl text-5xl font-extrabold mb-6 gradient-text">
                  Peserta Pkl
              </h1>
              <p class="text-xl leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-blue-100 mb-8">
                  Silahkan isi kegiatan kalian selama PKL
              </p>
              <div class="flex justify-center">
                  <div class="w-40 h-1 rounded-full bg-gradient-to-r from-teal-300 to-blue-500"></div>
              </div>
          </div>

          <div class="container mx-auto flex flex-wrap justify-center gap-8 mt-16">
              @foreach ([
                  ['title' => 'Jurnal', 'desc' => 'Isi Jurnal kegiatan kamu', 'route' => 'journals.index', 'color' => 'from-teal-500 to-teal-700', 'icon' => 'fa-book-open'],
                  ['title' => 'Absensi', 'desc' => 'Absen Hadir kegiatan PKL', 'route' => 'daftarhdr.index', 'color' => 'from-blue-500 to-blue-700', 'icon' => 'fa-user-check'],
                  ['title' => 'Absen Shalat', 'desc' => 'Absen Shalat selama PKL', 'route' => 'dftrshalats.index', 'color' => 'from-purple-500 to-purple-700', 'icon' => 'fa-pray']
              ] as $item)
              <div class="card p-8 w-96 flex flex-col text-center items-center card-hover bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20">
                  <div class="icon-container w-24 h-24 flex items-center justify-center rounded-full bg-gradient-to-br {{ $item['color'] }} mb-6 shadow-lg">
                      <i class="fas {{ $item['icon'] }} text-3xl text-white"></i>
                  </div>
                  <div class="flex-grow">
                      <h2 class="text-2xl font-bold mb-4 text-white">{{ $item['title'] }}</h2>
                      <p class="leading-relaxed text-lg text-blue-100 mb-6">{{ $item['desc'] }}</p>
                      <a class="inline-flex items-center px-6 py-3 rounded-full bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold hover:from-blue-600 hover:to-purple-600 transition-all duration-300 transition-link" href="{{ route($item['route']) }}">
                          Go Page
                          <i class="fas fa-arrow-right ml-3"></i>
                      </a>
                  </div>
              </div>
              @endforeach
          </div>
      </section>
  </div>
{{-- 
  <x-footer></x-footer> --}}

  <script>
      document.addEventListener('DOMContentLoaded', function() {
          // Page transition
          document.querySelectorAll('.transition-link').forEach(link => {
              link.addEventListener('click', (event) => {
                  event.preventDefault();
                  document.body.classList.add('fade-out');
                  setTimeout(() => {
                      window.location.href = link.href;
                  }, 500);
              });
          });

          // Add hover effect to cards
          document.querySelectorAll('.card').forEach(card => {
              card.addEventListener('mouseenter', () => {
                  card.querySelector('.icon-container').classList.add('floating');
              });
              card.addEventListener('mouseleave', () => {
                  card.querySelector('.icon-container').classList.remove('floating');
              });
          });

if (typeof Pusher !== 'undefined') {
        const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
            encrypted: true,
            authEndpoint: '/broadcasting/auth',
            auth: {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            }
        });

        @auth
        // Subscribe ke channel privat user
        const channel = pusher.subscribe('private-user.{{ auth()->id() }}');
        
        // Tangani event approval
        channel.bind('attendance.approval', function(data) {
            // Update UI notifikasi
            updateNotificationUI([{
                data: {
                    message: data.message,
                    type: data.type,
                    attendance: data.attendanceData
                },
                created_at: new Date().toISOString()
            }]);
            
            // Tampilkan toast
            showToast(data.message, data.type);
            
            // Animasi bel notifikasi
            const bell = document.getElementById('notificationButton');
            if (bell) {
                bell.classList.add('bell-shake');
                setTimeout(() => bell.classList.remove('bell-shake'), 500);
                
                // Update counter
                const counter = document.getElementById('notificationCount');
                if (counter) {
                    const currentCount = parseInt(counter.textContent) || 0;
                    counter.textContent = currentCount + 1;
                    counter.classList.remove('hidden');
                }
            }
        });
        @endauth
    }

    // Fungsi untuk memuat notifikasi
    async function loadNotifications() {
        try {
            const response = await fetch('/api/notifications', {
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });
            
            if (!response.ok) throw new Error('Failed to load notifications');
            
            const data = await response.json();
            updateNotificationUI(data);
        } catch (error) {
            console.error('Error loading notifications:', error);
            showErrorNotification('Gagal memuat notifikasi');
        }
    }

    // Fungsi untuk update UI notifikasi
    function updateNotificationUI(notifications) {
        const notificationList = document.getElementById('notificationList');
        const notificationCount = document.getElementById('notificationCount');
        
        if (!notificationList) return;

        if (notifications && notifications.length > 0) {
            notificationList.innerHTML = notifications.map(notif => {
                const message = notif.data?.message || 'Notifikasi baru';
                const type = notif.data?.type || 'info';
                const date = new Date(notif.created_at).toLocaleString();
                const icon = type === 'success' ? 'fa-check-circle text-green-400' : 
                             type === 'error' ? 'fa-times-circle text-red-400' : 
                             'fa-info-circle text-blue-400';
                
                return `
                    <div class="px-4 py-3 border-b border-gray-700 hover:bg-gray-700 cursor-pointer" 
                         onclick="handleNotificationClick(${notif.data?.attendance_id || 0})">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 pt-1">
                                <i class="fas ${icon}"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-white">${message}</p>
                                <p class="text-xs text-gray-400">${date}</p>
                                ${notif.data?.reason ? `<p class="text-xs text-gray-300 mt-1">Alasan: ${notif.data.reason}</p>` : ''}
                            </div>
                        </div>
                    </div>
                `;
            }).join('');
            
            if (notificationCount) {
                notificationCount.textContent = notifications.length;
                notificationCount.classList.remove('hidden');
            }
        } else {
            notificationList.innerHTML = '<div class="px-4 py-3 text-center text-gray-400">Tidak ada notifikasi baru</div>';
            if (notificationCount) {
                notificationCount.classList.add('hidden');
            }
        }
    }

    // Fungsi untuk menangani klik notifikasi
    window.handleNotificationClick = function(attendanceId) {
        if (attendanceId) {
            window.location.href = `/daftarhdr/${attendanceId}`;
        }
    };
  </script>
</body>