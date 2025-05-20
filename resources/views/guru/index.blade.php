<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>guru</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    body {
      background-color: #f8f9fa;
      padding: 0;
      margin: 0;
      color: #495057;
    }
    
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }
    
    header {
      text-align: center;
      margin-bottom: 40px;
      padding: 30px 0;
      background-color: #88c7dc;
      color: #2c3e50;
      width: 100%;
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
    }
    
    header h1 {
      margin-bottom: 10px;
      font-weight: 600;
    }
    
    .card-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
    }
    
    .card {
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
      overflow: hidden;
      width: 320px;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    
    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
    }
    
    .card-header {
      padding: 24px;
      text-align: center;
      color: white;
      position: relative;
      overflow: hidden;
    }
    
    .card-header::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(circle at top right, rgba(255,255,255,0.2), transparent 70%);
      pointer-events: none;
    }
    
    .absen-header {
      background-color: #79b8d1;
    }
    
    .jurnal-header {
      background-color: #8acdaf;
    }
    
    .shalat-header {
      background-color: #b6a4cc;
    }
    
    .card-body {
      padding: 30px 24px;
      text-align: center;
    }
    
    .icon {
      font-size: 64px;
      margin-bottom: 20px;
      filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
    }
    
    .card-body h3 {
      margin-bottom: 12px;
      color: #333;
      font-weight: 600;
    }
    
    .card-body p {
      color: #6c757d;
      line-height: 1.6;
    }
    
    .card-footer {
      padding: 20px;
      text-align: center;
      background-color: #f9f9f9;
      border-top: 1px solid #f0f0f0;
    }
    
    .btn {
      display: inline-block;
      padding: 12px 24px;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 500;
      transition: all 0.3s;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      letter-spacing: 0.5px;
    }
    
    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }
    
    .absen-btn {
      background-color: #79b8d1;
    }
    
    .absen-btn:hover {
      background-color: #6ba9c2;
    }
    
    .jurnal-btn {
      background-color: #8acdaf;
    }
    
    .jurnal-btn:hover {
      background-color: #7bbea0;
    }
    
    .shalat-btn {
      background-color: #b6a4cc;
    }
    
    .shalat-btn:hover {
      background-color: #a795bd;
    }
    
    @media (max-width: 768px) {
      .card {
        width: 100%;
        max-width: 380px;
      }
      
      .container {
        padding: 0 15px;
      }
      
      header .container {
        padding: 25px 15px;
      }
    }
  </style>
</head>
<body>
  <header>
    <div class="container">
      <h1>Selamat Datang</h1>
      <p>Pilih menu yang tersedia di bawah ini</p>
    </div>
  </header>
  
  <div class="container">
    <div class="card-container">
      <!-- Card Absen -->
      <div class="card">
        <div class="card-header absen-header">
          <h2>Absensi</h2>
        </div>
        <div class="card-body">
          <div class="icon">📝</div>
          <h3>Absensi Harian</h3>
          <p>Catat kehadiran Anda dengan mudah dan cepat</p>
        </div>
        <div class="card-footer">
          <a href="{{url('guru.absen')}}" class="btn absen-btn">Buka Absensi</a>
        </div>
      </div>
      
      <!-- Card Jurnal -->
      <div class="card">
        <div class="card-header jurnal-header">
          <h2>Jurnal</h2>
        </div>
        <div class="card-body">
          <div class="icon">📔</div>
          <h3>Jurnal Kegiatan</h3>
          <p>Catat aktivitas dan pembelajaran harian Anda</p>
        </div>
        <div class="card-footer">
          <a href="{{ route('guru.journal') }}" class="btn jurnal-btn">Buka Jurnal</a>
        </div>
      </div>
      
      <!-- Card Shalat -->
      <div class="card">
        <div class="card-header shalat-header">
          <h2>Shalat</h2>
        </div>
        <div class="card-body">
          <div class="icon">🕌</div>
          <h3>Jadwal Shalat</h3>
          <p>Pantau dan catat ibadah shalat Anda</p>
        </div>
        <div class="card-footer">
          <a href="{{route('guru.shalats')}}" class="btn shalat-btn">Buka Jadwal</a>
        </div>
      </div>
  </div>
  </div>
   {{-- <x-footer></x-footer> --}}

</body>
</html>