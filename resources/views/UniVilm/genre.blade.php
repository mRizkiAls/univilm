<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genre - UniVilm</title>

    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <style>
        /* ===== FIX FOOTER ===== */
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .section {
            flex: 1;
            padding: 40px;
        }

        .footer {
            margin-top: auto;
        }

        /* ===== HEADER ===== */
        .section-header h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        /* ===== GRID ===== */
        .genre-container {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 25px;
        }

        /* ===== CARD ===== */
        .genre-card {
            display: block;
            padding: 40px 25px;
            border-radius: 20px;
            text-decoration: none;
            color: white;
            transition: 0.3s;
            position: relative;
            overflow: hidden;

            background: linear-gradient(135deg, #416dff, #0c05047e);
        }

        .genre-card h3 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .genre-card p {
            font-size: 14px;
            opacity: 0.8;
        }

        /* ===== HOVER ===== */
        .genre-card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 10px 25px rgba(65,109,255,0.4);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1200px) {
            .genre-container {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .genre-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .genre-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="line-container">
    <div class="line line1"></div>
    <div class="line line2"></div>
    <div class="line line3"></div>
    <div class="line line4"></div>
    <div class="line line5"></div>
    <div class="line line6"></div>
    <div class="line line7"></div>
    <div class="line line8"></div>
    <div class="line line9"></div>
    <div class="line line10"></div>
</div>

<div class="navbar">
    <div class="left">
        <div class="logo">UniVilm</div>

        <div class="menu">
            <a href="/home" class="{{ request()->is('home') ? 'active' : '' }}">🏠︎ Home</a>
            <a href="/movie" class="{{ request()->is('movie') ? 'active' : '' }}">🎞️ Movie</a>
            <a href="/tv" class="{{ request()->is('tv') ? 'active' : '' }}">📺 TV Series</a>
            <a href="/leaderboard" class="{{ request()->is('leaderboard') ? 'active' : '' }}">🏆 Leaderboard</a>
            <a href="/genre" class="{{ request()->is('genre') ? 'active' : '' }}">𖤘 Genres</a>
            <a href="/history" class="{{ request()->is('history') ? 'active' : '' }}">🧭 History</a>
        </div>
    </div>

    <div class="right">
        <div onclick="openSearch()">🔍</div>

        @if(Auth::check())
        <a href="/profile" class="account-name">
            @if(Auth::user()->photo)
                <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="nav-img">
            @endif
            {{ Auth::user()->name }}
        </a>
        @else
        <a href="/signin" class="btn signin">Login</a>
        <a href="/signup" class="btn signup">Register</a>
        @endif
    </div>
</div>

<div class="section">
    <div class="section-header">
        <h2>Genre</h2>
    </div>

    <div class="genre-container">

        <a href="/movie" class="genre-card">
            <h3>🎞️ Movies</h3>
            <p>Explore all movies</p>
        </a>

        <a href="/tv" class="genre-card">
            <h3>📺 TV Series</h3>
            <p>Watch trending series</p>
        </a>

        <a href="/anime" class="genre-card">
            <h3>🌸 Anime</h3>
            <p>Best anime collection</p>
        </a>

        <a href="/pixar" class="genre-card">
            <h3>🧸 Pixar</h3>
            <p>Cartoon collection</p>
        </a>

        <a href="/trending" class="genre-card">
            <h3>⭐ Trending</h3>
            <p>What's popular now</p>
        </a>

        <a href="/adventure" class="genre-card">
            <h3>🧭 Adventure</h3>
            <p>Epic journeys</p>
        </a>

        <a href="/romance" class="genre-card">
            <h3>💖 Romance</h3>
            <p>Love stories</p>
        </a>

        <a href="/kdrama" class="genre-card">
            <h3> K-Drama</h3>
            <p>Korean series</p>
        </a>

        <a href="/horror" class="genre-card">
            <h3>👻 Horror</h3>
            <p>Scary vibes</p>
        </a>

        <a href="/comedy" class="genre-card">
            <h3>😂 Comedy</h3>
            <p>Fun & laugh</p>
        </a>

    </div>
</div>

<footer class="footer">
    <div class="footer-content">
        <h3>UniVilm</h3>

        <p>© 2026 UniVilm. All rights reserved.</p>
        <p class="credit">Made with Muhammad Rizki Al Syahputra</p>

        <div class="credit-box">
            <p><strong>Universitas:</strong> Sriwijaya</p>
            <p><strong>NIM:</strong> 09030282529042</p>
            <p><strong>Dosen Pembimbing:</strong> Winda Kurnia Sari, S.Si., M.Kom.</p>
        </div>

        <p class="social-text">
            Follow us:
            <a href="https://instagram.com/m.rizkials" target="_blank">Instagram</a> |
            <a href="https://tiktok.com/@mrizkials" target="_blank">TikTok</a>
        </p>
    </div>
</footer>

</body>
</html>