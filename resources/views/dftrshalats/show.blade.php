   <!-- Menampilkan data Waktu Shalat jika ada -->
   
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Detail Waktu Shalat</title>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body>
       <div class="container mt-5">
           <h1>Detail Waktu Shalat</h1>
           <p><strong>Tipe:</strong> {{ $dftrshalat->type }}</p>
           <p><strong>Tanggal:</strong> {{ $dftrshalat->tanggal }}</p>
           <p><strong>Hari:</strong> {{ $dftrshalat->hari }}</p>
           <p><strong>Waktu:</strong> {{ $dftrshalat->waktu }}</p>
           <a href="{{ route('dftrshalats.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
       </div>
   </body>
   </html>
   