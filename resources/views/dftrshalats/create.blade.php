<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Shalat</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <style>
    :root {
      --primary-color: #5e72e4;
      --secondary-color: #11cdef;
      --success-color: #2dce89;
      --warning-color: #fb6340;
      --danger-color: #f5365c;
      --light-color: #f8f9fe;
      --dark-color: #172b4d;
      --gradient-start: #7795f8;
      --gradient-end: #6772e5;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
      background: linear-gradient(135deg, #ebf4ff 0%, #d7e8ff 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0;
      padding: 1rem;
      color: var(--dark-color);
    }
    
    .form-container {
      width: 100%;
      max-width: 480px;
      background: #ffffff;
      border-radius: 16px;
      padding: 2rem;
      box-shadow: 0 10px 25px rgba(50, 50, 93, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
      overflow: hidden;
      position: relative;
      transition: all 0.3s ease;
    }
    
    .form-container:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(50, 50, 93, 0.15), 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .form-header {
      text-align: center;
      margin-bottom: 2rem;
      position: relative;
    }
    
    .form-title {
      font-size: 1.8rem;
      font-weight: 700;
      color: var(--primary-color);
      margin-bottom: 0.5rem;
    }
    
    .form-subtitle {
      color: #8898aa;
      font-size: 0.95rem;
    }
    
    .form-group {
      margin-bottom: 1.5rem;
      position: relative;
    }
    
    .form-label {
      display: block;
      margin-bottom: 0.5rem;
      font-size: 0.9rem;
      font-weight: 600;
      color: #525f7f;
    }
    
    .form-control {
      width: 100%;
      padding: 0.75rem 1rem 0.75rem 2.5rem;
      border: 1px solid #e9ecef;
      border-radius: 8px;
      background-color: #fff;
      color: #3c4d69;
      font-size: 0.95rem;
      transition: all 0.2s ease;
    }
    
    .form-control:focus {
      outline: none;
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(94, 114, 228, 0.15);
    }
    
    .form-control[readonly] {
      background-color: #f8f9fa;
      cursor: default;
    }
    
    .input-icon {
      position: absolute;
      left: 0.75rem;
      top: 2.45rem;
      color: var(--primary-color);
      font-size: 1rem;
    }
    
    .submit-btn {
      width: 100%;
      padding: 0.85rem;
      margin-top: 1rem;
      border: none;
      border-radius: 8px;
      background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
      color: white;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 0.5rem;
      box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
    }
    
    .submit-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
    }
    
    .submit-btn:active {
      transform: translateY(0);
    }
    
    .prayer-time-badge {
      display: inline-block;
      padding: 0.35rem 1rem;
      border-radius: 20px;
      font-size: 0.95rem;
      font-weight: 600;
      margin: 0.5rem auto 1rem;
      text-align: center;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
      transition: all 0.3s ease;
    }
    
    .highlight-field {
      background-color: rgba(94, 114, 228, 0.05) !important;
      border-color: rgba(94, 114, 228, 0.3) !important;
    }
    
    /* Prayer-specific styles */
    .prayer-subuh { 
      background-color: #e8f4ff; 
      color: #3498db; 
      border: 1px solid rgba(52, 152, 219, 0.2);
    }
    
    .prayer-dzuhur { 
      background-color: #fff8e1; 
      color: #f39c12; 
      border: 1px solid rgba(243, 156, 18, 0.2);
    }
    
    .prayer-ashar { 
      background-color: #fff0e6; 
      color: #e67e22; 
      border: 1px solid rgba(230, 126, 34, 0.2);
    }
    
    .prayer-maghrib { 
      background-color: #ffe8e8; 
      color: #e74c3c; 
      border: 1px solid rgba(231, 76, 60, 0.2);
    }
    
    .prayer-isya { 
      background-color: #f3e8ff; 
      color: #9b59b6; 
      border: 1px solid rgba(155, 89, 182, 0.2);
    }
    
    .prayer-duha { 
      background-color: #e8fff6; 
      color: #1abc9c; 
      border: 1px solid rgba(26, 188, 156, 0.2);
    }
    
    /* Subtle animation */
    @keyframes gentle-pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.02); }
      100% { transform: scale(1); }
    }
    
    .badge-pulse {
      animation: gentle-pulse 2s infinite;
    }
    
    /* Responsive adjustments */
    @media (max-width: 576px) {
      .form-container {
        padding: 1.5rem;
        margin: 0 1rem;
      }
      
      .form-title {
        font-size: 1.5rem;
      }
      
      .form-control {
        font-size: 0.9rem;
      }
    }
    
    @media (max-width: 350px) {
      .form-container {
        padding: 1.25rem;
      }
      
      .form-group {
        margin-bottom: 1.25rem;
      }
      
      .submit-btn {
        padding: 0.75rem;
      }
    }
  </style>
</head>
<body>
  <div class="form-container">
    <div class="form-header">
      <h1 class="form-title">Pencatatan Shalat</h1>
      <p class="form-subtitle">Rekam ibadah harian Anda</p>
    </div>
    
    <form action="{{ route('dftrshalats.store') }}" method="POST">
      @csrf
      
      <div class="form-group">
        <span class="input-icon"><i class="fas fa-pray"></i></span>
        <label for="jenis" class="form-label">Jenis Shalat</label>
        <div class="prayer-time-badge badge-pulse" id="jenis-badge">Sedang memuat...</div>
        <input type="text" id="jenis" name="jenis" class="form-control highlight-field" readonly>
      </div>
      
      <div class="form-group">
        <span class="input-icon"><i class="fas fa-user"></i></span>
        <label for="nama" class="form-label">Nama</label>
        <input type="text" id="nama" name="nama" value="{{ Auth::user()->full_name }}" class="form-control" readonly>
      </div>
      
      <div class="form-group">
        <span class="input-icon"><i class="fas fa-building"></i></span>
        <label for="perusahaan" class="form-label">Perusahaan</label>
        <input type="text" id="perusahaan" name="perusahaan"value="{{ Auth::user()->company_id }}" class="form-control" readonly>
      </div>
      
      <div class="form-group">
        <span class="input-icon"><i class="fas fa-calendar-alt"></i></span>
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" id="tanggal" name="tanggal" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control" readonly>
      </div>
      
      <div class="form-group">
        <span class="input-icon"><i class="fas fa-calendar-day"></i></span>
        <label for="hari" class="form-label">Hari</label>
        <input type="text" id="hari" name="hari" value="{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd') }}" class="form-control" readonly>
      </div>
      
      <div class="form-group">
        <span class="input-icon"><i class="fas fa-clock"></i></span>
        <label for="waktu" class="form-label">Waktu Shalat</label>
        <input type="time" id="waktu" name="waktu" class="form-control highlight-field" readonly>
      </div>
      
      <button type="submit" class="submit-btn">
        <i class="fas fa-save"></i> Simpan Catatan
      </button>
    </form>
  </div>
  
  <script>
    function updateRealTime() {
      const waktuInput = document.getElementById('waktu');
      const jenisInput = document.getElementById('jenis');
      const jenisBadge = document.getElementById('jenis-badge');
      
      const now = new Date();
      const hours = now.getHours().toString().padStart(2, '0');
      const minutes = now.getMinutes().toString().padStart(2, '0');
      
      waktuInput.value = `${hours}:${minutes}`;

      let jenisShalat = 'subuh'; // Default jika di luar waktu utama
      let prayerClass = 'prayer-subuh';

      if (hours >= 4 && hours < 11) {
        jenisShalat = 'duha';
        prayerClass = 'prayer-duha';
      }
      else if (hours >= 12 && hours < 15) {
        jenisShalat = 'dzuhur';
        prayerClass = 'prayer-dzuhur';
      }
      else if (hours >= 15 && hours < 18) {
        jenisShalat = 'ashar';
        prayerClass = 'prayer-ashar';
      }
     

      jenisInput.value = jenisShalat;
      
      // Update the badge
      jenisBadge.textContent = `Waktu ${jenisShalat}`;
      
      // Remove any existing prayer classes
      jenisBadge.classList.remove('prayer-subuh', 'prayer-dzuhur', 'prayer-ashar', 'prayer-maghrib', 'prayer-isya', 'prayer-duha');
      
      // Add the appropriate prayer class
      jenisBadge.classList.add(prayerClass);
      
      requestAnimationFrame(updateRealTime);
    }

    document.addEventListener('DOMContentLoaded', function() {
      updateRealTime();
    });
  </script>
</body>
</html>