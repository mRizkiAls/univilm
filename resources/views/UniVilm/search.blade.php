<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Search - UniVilm</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <style>
        .section {
            padding: 40px;
        }

        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            color: #00d9ff;
            text-decoration: none;
            font-weight: bold;
        }

        .back-btn:hover {
            color: #fff;
        }

        .empty {
            opacity: 0.7;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="section">

  
    <a href="/home" class="back-btn">← Back to Home</a>

   
    <h2>Hasil pencarian: "{{ $query }}"</h2>

   
    @if(!$query)
        <p class="empty">Maintenence 🔍</p>
    @endif

    <div class="movie-list">

        
        @forelse($films as $film)
            <div class="card">

            
                <img src="{{ asset('img/' . $film->image) }}" draggable="false">

              
                <div class="title">{{ $film->title }}</div>

           
                <div class="rating">{{ $film->genre }}</div>

            </div>
        @empty
           
            <p class="empty">Tidak ditemukan 😢</p>
        @endforelse

    </div>

</div>

</body>
</html>