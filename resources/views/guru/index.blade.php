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
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    body {
      background-color: #f5f5f5;
      padding: 20px;
    }
    
    .container {
      max-width: 1200px;
      margin: 0 auto;
    }
    
    header {
      text-align: center;
      margin-bottom: 30px;
      padding: 20px;
      background-color: #4682B4;
      color: white;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .card-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }
    
    .card {
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      width: 300px;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    
    .card-header {
      padding: 20px;
      text-align: center;
      color: white;
    }
    
    .absen-header {
      background-color: #3498db;
    }
    
    .jurnal-header {
      background-color: #2ecc71;
    }
    
    .shalat-header {
      background-color: #9b59b6;
    }
    
    .card-body {
      padding: 20px;
      text-align: center;
    }
    
    .icon {
      font-size: 60px;
      margin-bottom: 15px;
    }
    
    .card-footer {
      padding: 15px;
      text-align: center;
      background-color: #f9f9f9;
    }
    
    .btn {
      display: inline-block;
      padding: 10px 20px;
      background-color: #3498db;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
      transition: background-color 0.3s;
    }
    
    .btn:hover {
      background-color: #2980b9;
    }
    
    .absen-btn {
      background-color: #3498db;
    }
    
    .absen-btn:hover {
      background-color: #2980b9;
    }
    
    .jurnal-btn {
      background-color: #2ecc71;
    }
    
    .jurnal-btn:hover {
      background-color: #27ae60;
    }
    
    .shalat-btn {
      background-color: #9b59b6;
    }
    
    .shalat-btn:hover {
      background-color: #8e44ad;
    }
    
    @media (max-width: 768px) {
      .card {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1>Selamat Datang</h1>
      <p>Pilih menu yang tersedia di bawah ini</p>
    </header>
    
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
</body>
</html>