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
      background-color: #131419;
      padding: 0;
      margin: 0;
      color: #e0e0e0;
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
      background-color: #1e2130;
      color: #f8f9fa;
      width: 100%;
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
      border-bottom: 1px solid #2c3044;
    }
    
    header h1 {
      margin-bottom: 10px;
      font-weight: 600;
      background: linear-gradient(45deg, #88c7dc, #9a7ec9);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-shadow: 0 2px 10px rgba(136, 199, 220, 0.2);
    }
    
    header p {
      color: #b8b8b8;
    }
    
    .card-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
    }
    
    .card {
      background-color: #1e2130;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      overflow: hidden;
      width: 320px;
      transition: transform 0.3s, box-shadow 0.3s;
      border: 1px solid #2c3044;
    }
    
    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.25), 0 0 15px rgba(136, 199, 220, 0.15);
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
      background: radial-gradient(circle at top right, rgba(255,255,255,0.1), transparent 70%);
      pointer-events: none;
    }
    
    .absen-header {
      background-color: #203847;
      border-bottom: 2px solid #79b8d1;
    }
    
    .jurnal-header {
      background-color: #1f3b2c;
      border-bottom: 2px solid #8acdaf;
    }
    
    .shalat-header {
      background-color: #2d2842;
      border-bottom: 2px solid #b6a4cc;
    }
    
    .card-body {
      padding: 30px 24px;
      text-align: center;
      background-color: #252a3d;
    }
    
    .icon {
      font-size: 64px;
      margin-bottom: 20px;
      filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.3));
    }
    
    .card-body h3 {
      margin-bottom: 12px;
      color: #f0f0f0;
      font-weight: 600;
    }
    
    .card-body p {
      color: #b0b0b0;
      line-height: 1.6;
    }
    
    .card-footer {
      padding: 20px;
      text-align: center;
      background-color: #1e2130;
      border-top: 1px solid #2c3044;
    }
    
    .btn {
      display: inline-block;
      padding: 12px 24px;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 500;
      transition: all 0.3s;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
      letter-spacing: 0.5px;
    }
    
    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4), 0 0 10px rgba(255, 255, 255, 0.1);
    }
    
    .absen-btn {
      background: linear-gradient(135deg, #1a4c66, #79b8d1);
      border: 1px solid #79b8d1;
    }
    
    .absen-btn:hover {
      background: linear-gradient(135deg, #1d5474, #6ba9c2);
    }
    
    .jurnal-btn {
      background: linear-gradient(135deg, #1d5e3e, #8acdaf);
      border: 1px solid #8acdaf;
    }
    
    .jurnal-btn:hover {
      background: linear-gradient(135deg, #1f654a, #7bbea0);
    }
    
    .shalat-btn {
      background: linear-gradient(135deg, #372c54, #b6a4cc);
      border: 1px solid #b6a4cc;
    }
    
    .shalat-btn:hover {
      background: linear-gradient(135deg, #3d305e, #a795bd);
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
          <a href="{{url('guru/absen')}}" class="btn absen-btn">Buka Absensi</a>
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