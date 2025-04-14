<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      overflow-x: hidden;
    }

    /* Overlay Background */
    .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      backdrop-filter: blur(5px);
      z-index: 99;
      transition: opacity 0.3s ease;
    }

    .overlay.active {
      display: block;
      opacity: 1;
    }

    /* Sidebar Style */
    .sidebar {
      width: 250px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #2c2c3d;
      background-image: linear-gradient(135deg, #2c2c3d, #1f1f2c);
      color: #e0e0e0;
      box-shadow: 3px 0 15px rgba(0, 0, 0, 0.2);
      transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      z-index: 100;
    }

    .sidebar.closed {
      transform: translateX(-250px);
    }

    .sidebar-content {
      padding: 1.5rem;
    }

    .menu-title {
      font-size: 1.1rem;
      color: #f0f0f0;
      margin-top: 0;
      margin-bottom: 1.5rem;
      font-weight: 500;
      letter-spacing: 0.5px;
    }

    .menu-list {
      list-style: none;
      padding: 0;
      margin: 0 0 1.5rem 0;
    }

    .menu-list li {
      margin-bottom: 0.6rem;
    }

    .menu-list a {
      display: flex;
      align-items: center;
      padding: 0.7rem 0.8rem;
      color: #d0d0d8;
      text-decoration: none;
      border-radius: 6px;
      transition: all 0.2s ease;
    }

    .menu-list a:hover {
      background-color: rgba(255, 255, 255, 0.1);
      color: #fff;
      transform: translateX(5px);
    }

    .menu-list a i {
      margin-right: 10px;
      font-size: 1rem;
      width: 20px;
      text-align: center;
      opacity: 0.85;
    }

    /* Toggle Button */
    #sidebarToggle {
      position: absolute;
      top: 1rem;
      right: -18px;
      z-index: 101;
      width: 36px;
      height: 36px;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #5d4ea8;
      color: white;
      border: none;
      border-radius: 50%;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
      cursor: pointer;
      transition: all 0.3s ease;
    }

    #sidebarToggle:hover {
      background-color: #4a3f87;
    }

    #sidebarToggle.rotated i {
      transform: rotate(180deg);
    }

    .back-button {
      display: flex;
      align-items: center;
      width: 100%;
      padding: 0.8rem;
      margin-top: 1.5rem;
      background-color: rgba(255, 255, 255, 0.1);
      color: #e0e0e0;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: all 0.2s ease;
      font-size: 0.9rem;
    }

    .back-button:hover {
      background-color: rgba(255, 255, 255, 0.15);
    }

    .back-button i {
      margin-right: 8px;
    }
  </style>
</head>
<body>
  <!-- Overlay -->
  <div id="overlay" class="overlay"></div>

  <!-- Sidebar -->
  <nav id="sidebar" class="sidebar">
    <div class="sidebar-content">
      <h4 class="menu-title">Menu</h4>
      <ul class="menu-list">
        <li>
          <a href="#">
            <i class="fas fa-mosque"></i>
            <span>Shalat</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-calendar-check"></i>
            <span>Absen</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-book"></i>
            <span>Journal</span>
          </a>
        </li>
      </ul>
      
      <button class="back-button">
        <i class="fas fa-arrow-left"></i>
        <span>Back</span>
      </button>
    </div>
    
    <!-- Toggle Button -->
    <button id="sidebarToggle">
      <i class="fas fa-chevron-left"></i>
    </button>
  </nav>

  <script>
    // Ambil elemen sidebar, tombol toggle, dan overlay
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const overlay = document.getElementById('overlay');

    // Tambahkan event listener pada tombol toggle
    sidebarToggle.addEventListener('click', () => {
      // Toggle class pada sidebar
      sidebar.classList.toggle('closed');
      
      // Toggle class untuk overlay
      overlay.classList.toggle('active');
      
      // Ubah icon berdasarkan status sidebar
      const toggleIcon = sidebarToggle.querySelector('i');
      if (sidebar.classList.contains('closed')) {
        toggleIcon.className = 'fas fa-chevron-right';
      } else {
        toggleIcon.className = 'fas fa-chevron-left';
      }
    });

    // Tutup sidebar saat overlay diklik
    overlay.addEventListener('click', () => {
      sidebar.classList.add('closed');
      overlay.classList.remove('active');
      const toggleIcon = sidebarToggle.querySelector('i');
      toggleIcon.className = 'fas fa-chevron-right';
    });
  </script>
</body>
</html>