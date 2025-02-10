<!-- Include Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="font-family: 'Roboto', sans-serif; display: flex; flex-direction: column; height: 100vh;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('pembimbingpkl') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3" style="color: #00f2ff;">PKL Siswa</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Heading -->
    <div class="sidebar-heading" style="margin-top: 20px; margin-bottom: 10px; color: #00f2ff;">
        Interface
    </div>

    <!-- Nav Items -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pembimbing.journals') }}" style="color: #00f2ff;">
            <i class="fa-solid fa-address-book"></i>
            <span>Journal</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pembimbing.approvals') }}" style="color: #00f2ff;">
            <i class="fa-solid fa-eye"></i>
            <span>Absensi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pembimbing.shalat') }}" style="color: #00f2ff;">
            <i class="fa-solid fa-mosque"></i>
            <span>Absen Shalat</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Footer -->
    <div class="sidebar-footer text-center" style="margin-top: auto; padding: 15px 0; border-top: 1px solid rgba(255, 255, 255, 0.2);">
        <p class="text-white" style="font-size: 0.9rem;">Pembimbing Pkl</p>
        <i class="fas fa-cog fa-spin" style="font-size: 1.5rem;"></i>
    </div>
</ul>

<!-- CSS for Animation, Styling, and Spacing -->
<style>
    body {
        background: linear-gradient(to right, #0a192f, #1c1c1c);
        color: white;
    }

    .navbar-nav {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .nav-link {
        transition: background-color 0.3s ease, transform 0.2s ease;
        padding: 10px 20px;
        margin: 5px 0;
        border-radius: 5px;
    }

    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.2);
        transform: translateX(5px);
    }

    .sidebar-brand {
        transition: transform 0.3s ease;
        margin-bottom: 20px;
        font-weight: 700;
 }

    .sidebar-brand:hover {
        transform: scale(1.05);
    }

    .sidebar-divider {
        border-color: rgba(255, 255, 255, 0.2);
        margin: 10px 0;
    }

    .sidebar-footer {
        padding: 15px 0;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        margin-top: auto;
        font-size: 0.9rem;
    }

    .sidebar-footer i {
        color: #ffffff;
        margin-top: 5px;
    }
</style>

<script>
    const toggleButton = document.getElementById('sidebarToggle');
    toggleButton.addEventListener('click', () => {
        const sidebar = document.querySelector('.sidebar');
        sidebar.classList.toggle('collapsed');
    });
</script>
