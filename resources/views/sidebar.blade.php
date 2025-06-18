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
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      backdrop-filter: blur(5px);
      z-index: 99;
      opacity: 0;
      visibility: hidden;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .overlay.active {
      opacity: 1;
      visibility: visible;
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
      transform: translateX(0);
      transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      z-index: 100;
    }

    .sidebar.closed {
      transform: translateX(-250px);
    }

    .sidebar-content {
      padding: 1.5rem;
      opacity: 1;
      transition: opacity 0.3s ease 0.1s;
    }

    .sidebar.closed .sidebar-content {
      opacity: 0;
      transition: opacity 0.2s ease;
    }

    .menu-title {
      font-size: 1.1rem;
      color: #f0f0f0;
      margin-top: 0;
      margin-bottom: 1.5rem;
      font-weight: 500;
      letter-spacing: 0.5px;
      transform: translateY(0);
      transition: transform 0.3s ease 0.2s;
    }

    .sidebar.closed .menu-title {
      transform: translateY(-10px);
      transition: transform 0.2s ease;
    }

    .menu-list {
      list-style: none;
      padding: 0;
      margin: 0 0 1.5rem 0;
    }

    .menu-list li {
      margin-bottom: 0.6rem;
      transform: translateX(0);
      opacity: 1;
      transition: all 0.3s ease;
    }

    .sidebar.closed .menu-list li {
      transform: translateX(-20px);
      opacity: 0;
    }

    .menu-list li:nth-child(1) { transition-delay: 0.1s; }
    .menu-list li:nth-child(2) { transition-delay: 0.15s; }
    .menu-list li:nth-child(3) { transition-delay: 0.2s; }

    .sidebar.closed .menu-list li:nth-child(1) { transition-delay: 0s; }
    .sidebar.closed .menu-list li:nth-child(2) { transition-delay: 0s; }
    .sidebar.closed .menu-list li:nth-child(3) { transition-delay: 0s; }

    .menu-list a {
      display: flex;
      align-items: center;
      padding: 0.7rem 0.8rem;
      color: #d0d0d8;
      text-decoration: none;
      border-radius: 6px;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
    }

    .menu-list a::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
      transition: left 0.5s ease;
    }

    .menu-list a:hover::before {
      left: 100%;
    }

    .menu-list a:hover {
      background-color: rgba(255, 255, 255, 0.1);
      color: #fff;
      transform: translateX(8px) scale(1.02);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .menu-list a i {
      margin-right: 10px;
      font-size: 1rem;
      width: 20px;
      text-align: center;
      opacity: 0.85;
      transition: all 0.3s ease;
    }

    .menu-list a:hover i {
      opacity: 1;
      transform: scale(1.1);
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
      background: linear-gradient(135deg, #5d4ea8, #4a3f87);
      color: white;
      border: none;
      border-radius: 50%;
      box-shadow: 0 4px 12px rgba(93, 78, 168, 0.3);
      cursor: pointer;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    #sidebarToggle:hover {
      background: linear-gradient(135deg, #4a3f87, #3d3470);
      transform: scale(1.1);
      box-shadow: 0 6px 20px rgba(93, 78, 168, 0.4);
    }

    #sidebarToggle:active {
      transform: scale(0.95);
    }

    #sidebarToggle i {
      transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
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
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      font-size: 0.9rem;
      position: relative;
      overflow: hidden;
      transform: translateY(0);
      opacity: 1;
    }

    .sidebar.closed .back-button {
      transform: translateY(10px);
      opacity: 0;
      transition: all 0.2s ease;
    }

    .back-button::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
      transition: left 0.5s ease;
    }

    .back-button:hover::before {
      left: 100%;
    }

    .back-button:hover {
      background-color: rgba(255, 255, 255, 0.2);
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .back-button i {
      margin-right: 8px;
      transition: transform 0.3s ease;
    }

    .back-button:hover i {
      transform: translateX(-3px);
    }

    /* Pulse animation for toggle button when sidebar is closed */
    @keyframes pulse {
      0% { box-shadow: 0 4px 12px rgba(93, 78, 168, 0.3); }
      50% { box-shadow: 0 4px 20px rgba(93, 78, 168, 0.6); }
      100% { box-shadow: 0 4px 12px rgba(93, 78, 168, 0.3); }
    }

    .sidebar.closed #sidebarToggle {
      animation: pulse 2s infinite;
    }

    /* Slide-in animation for menu items */
    @keyframes slideInLeft {
      from {
        transform: translateX(-30px);
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }

    .sidebar:not(.closed) .menu-list li {
      animation: slideInLeft 0.4s ease forwards;
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
          <a href="dftrshalats">
            <i class="fas fa-mosque"></i>
            <span>Shalat</span>
          </a>
        </li>
        <li>
          <a href="daftarhdr">
            <i class="fas fa-calendar-check"></i>
            <span>Absen</span>
          </a>
        </li>
        <li>
          <a href="journals">
            <i class="fas fa-book"></i>
            <span>Journal</span>
          </a>
        </li>
      </ul>
      
      <button class="back-button" onclick="location.href='welcome'">
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
    class SidebarAnimator {
      constructor() {
        this.sidebar = document.getElementById('sidebar');
        this.sidebarToggle = document.getElementById('sidebarToggle');
        this.overlay = document.getElementById('overlay');
        this.toggleIcon = this.sidebarToggle.querySelector('i');
        this.isAnimating = false;
        
        this.init();
      }

      init() {
        // Event listener untuk toggle button
        this.sidebarToggle.addEventListener('click', () => this.toggleSidebar());
        
        // Event listener untuk overlay
        this.overlay.addEventListener('click', () => this.closeSidebar());
        
        // Event listener untuk keyboard (ESC key)
        document.addEventListener('keydown', (e) => {
          if (e.key === 'Escape' && !this.sidebar.classList.contains('closed')) {
            this.closeSidebar();
          }
        });

        // Tambahkan efek hover pada menu items
        this.addMenuItemEffects();
      }

      toggleSidebar() {
        if (this.isAnimating) return;
        
        this.isAnimating = true;
        
        if (this.sidebar.classList.contains('closed')) {
          this.openSidebar();
        } else {
          this.closeSidebar();
        }
        
        // Reset animating flag setelah animasi selesai
        setTimeout(() => {
          this.isAnimating = false;
        }, 400);
      }

      openSidebar() {
        // Buka sidebar
        this.sidebar.classList.remove('closed');
        this.overlay.classList.add('active');
        
        // Animasi icon
        this.animateToggleIcon('fas fa-chevron-left', false);
        
        // Trigger reflow untuk memastikan animasi berjalan
        this.sidebar.offsetHeight;
        
        // Tambahkan efek stagger untuk menu items
        this.staggerMenuItems(true);
      }

      closeSidebar() {
        // Tutup sidebar
        this.sidebar.classList.add('closed');
        this.overlay.classList.remove('active');
        
        // Animasi icon
        this.animateToggleIcon('fas fa-chevron-right', true);
        
        // Stagger effect untuk menu items saat tutup
        this.staggerMenuItems(false);
      }

      animateToggleIcon(iconClass, isRotated) {
        // Animasi rotasi dengan scale effect
        this.toggleIcon.style.transform = 'scale(0)';
        
        setTimeout(() => {
          this.toggleIcon.className = iconClass;
          this.toggleIcon.style.transform = isRotated ? 'scale(1) rotate(180deg)' : 'scale(1)';
        }, 150);
      }

      staggerMenuItems(isOpening) {
        const menuItems = this.sidebar.querySelectorAll('.menu-list li');
        
        menuItems.forEach((item, index) => {
          if (isOpening) {
            setTimeout(() => {
              item.style.transform = 'translateX(0)';
              item.style.opacity = '1';
            }, index * 100);
          } else {
            setTimeout(() => {
              item.style.transform = 'translateX(-20px)';
              item.style.opacity = '0';
            }, index * 50);
          }
        });
      }

      addMenuItemEffects() {
        const menuLinks = this.sidebar.querySelectorAll('.menu-list a');
        
        menuLinks.forEach(link => {
          // Efek ripple saat diklik
          link.addEventListener('click', (e) => {
            this.createRippleEffect(e, link);
          });
          
          // Efek bounce saat hover
          link.addEventListener('mouseenter', () => {
            link.style.transform = 'translateX(8px) scale(1.02)';
          });
          
          link.addEventListener('mouseleave', () => {
            link.style.transform = 'translateX(0) scale(1)';
          });
        });
      }

      createRippleEffect(event, element) {
        const ripple = document.createElement('span');
        const rect = element.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = event.clientX - rect.left - size / 2;
        const y = event.clientY - rect.top - size / 2;
        
        ripple.style.cssText = `
          position: absolute;
          border-radius: 50%;
          background: rgba(255, 255, 255, 0.3);
          transform: scale(0);
          animation: ripple 0.6s linear;
          left: ${x}px;
          top: ${y}px;
          width: ${size}px;
          height: ${size}px;
          pointer-events: none;
        `;
        
        // Tambahkan keyframes untuk ripple
        if (!document.querySelector('#ripple-styles')) {
          const style = document.createElement('style');
          style.id = 'ripple-styles';
          style.textContent = `
            @keyframes ripple {
              to {
                transform: scale(2);
                opacity: 0;
              }
            }
          `;
          document.head.appendChild(style);
        }
        
        element.style.position = 'relative';
        element.appendChild(ripple);
        
        setTimeout(() => {
          ripple.remove();
        }, 600);
      }
    }

    // Inisialisasi sidebar animator saat DOM loaded
    document.addEventListener('DOMContentLoaded', () => {
      new SidebarAnimator();
    });

    // Tambahkan smooth scroll untuk links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    });
  </script>
</body>
</html>