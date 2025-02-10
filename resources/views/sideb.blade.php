 <!-- Tailwind CSS (via CDN) -->
 <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 <!-- Google Fonts -->
 <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 @vite('resources/css/app.css')
 <style>
   /* Background halaman: gradasi dari biru tua ke hitam */
   body {
     background: linear-gradient(to right, #0a192f, #1c1c1c);
     color: white;
   }
   /* Sidebar styling agar selalu terlihat */
   #sideb {
     width: 250px;
     background: linear-gradient(135deg, #0a192f, #001b42);
     color: white;
   }
   /* Styling sidebar brand & navigation */
   .sidebar-brand {
     padding: 1.5rem;
     font-size: 1.75rem;
     font-weight: bold;
     display: flex;
     align-items: center;
     justify-content: center;
     border-bottom: 2px solid #00f2ff;
   }
   .sidebar-nav li a {
     padding: 0.75rem 1.5rem;
     display: block;
     transition: background 0.3s;
   }
   .sidebar-nav li a:hover {
     background: rgba(0, 242, 255, 0.1);
   }
   /* Tabel custom styling sesuai tema */
   .table-custom {
     width: 100%;
     border-collapse: collapse;
   }
   .table-custom th,
   .table-custom td {
     border: 2px solid #00f2ff !important;
     padding: 0.75rem 1rem;
     text-align: center;
     color: white;
   }
   .table-custom thead {
     background-color: #001b42;
   }
   .table-custom tbody tr:hover {
     background: rgba(0, 242, 255, 0.1);
   }
   /* Modal untuk Zoom Gambar */
   .modal {
     display: none;
     position: fixed;
     top: 0;
     left: 0;
     width: 100%;
     height: 100%;
     justify-content: center;
     align-items: center;
     z-index: 50;
     background-color: rgba(0, 0, 0, 0.5);
   }
   .modal img {
     max-width: 95%;
     max-height: 95%;
     border-radius: 0.5rem;
   }
 </style>
 <script>
   function showModal(img) {
     const modal = document.getElementById('imageModal');
     const modalImage = document.getElementById('modalImage');
     modalImage.src = img.src;
     modal.style.display = 'flex';
   }
   function hideModal() {
     const modal = document.getElementById('imageModal');
     modal.style.display = 'none';
   }
 </script>
</head>
<body>
 <div class="flex h-screen">
   <!-- Sidebar Always Visible -->
   <div id="sideb">
     <!-- Sidebar Brand -->
     <div class="sidebar-brand">
       <i class="fas fa-laugh-wink text-cyan-400"></i>
       <span class="ml-2">PKL Siswa</span>
     </div>
     <!-- Sidebar Navigation -->
     <ul class="sidebar-nav">
       <li>
         <a href="{{ route('pembimbing.journals') }}">
           <i class="fa-solid fa-address-book text-cyan-400"></i>
           <span class="ml-2">Journal</span>
         </a>
       </li>
       <li>
         <a href="{{ route('pembimbing.approvals') }}">
           <i class="fa-solid fa-eye text-cyan-400"></i>
           <span class="ml-2">Absensi</span>
         </a>
       </li>
       <li>
         <a href="{{ route('pembimbing.shalat') }}">
           <i class="fa-solid fa-mosque text-cyan-400"></i>
           <span class="ml-2">Absen Shalat</span>
         </a>
       </li>
     </ul>
   </div>