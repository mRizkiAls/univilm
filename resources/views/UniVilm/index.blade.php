<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>UniVilm</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
<div id="notif" class="notif"></div>
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


<div id="searchOverlay" class="search-overlay">
    <div class="search-box">
        <input type="text" id="searchInput" placeholder="Search film...">
        <button onclick="closeSearch()">ESC</button>
    </div>

    <h3>TOP SEARCHES NOW</h3>
    <div id="results"></div>
</div>
<div class="slider">

    <div class="slides" id="slides">
        <img src="img/walle1.jpg" draggable="false">
        
        <img src="img/spidermanbrandnewday.jpg" draggable="false">
        <img src="img/summer.jpg" draggable="false">
    </div>

   
    <button class="prev" onclick="prevSlide()">❮</button>
    <button class="next" onclick="nextSlide()">❯</button>

</div>
<div class="section-divider"></div>
<div class="section">
    <div class="section-header">
        <h2>Trending Now⭐</h2>
        <a href="/trending" class="btn-view-all">View All ➤</a>
    </div>
    <div class="movie-list">
        
        <div class="card">
            <span class="rank">1</span>
            <span class="badge">Movie</span>
            <img src="img/mario.jpg" draggable="false">
            <div class="rating">⭐ 8.4</div>
            <div class="title">The Super Mario Galaxy Movie</div>
        </div>
       
        <div class="card">
            <span class="rank">2</span>
            <span class="badge">Movie</span>
            <img src="img/blodhan.jpg" draggable="false">
            <div class="rating">⭐ 8.3</div>
            <div class="title">Bloodhounds (2023)</div>
        </div>

        <div class="card">
            <span class="rank">3</span>
            <span class="badge">TV</span>
            <img src="img/onepiece.jpg" draggable="false">
            <div class="rating">⭐ 8.3</div>
            <div class="title">One Piece</div>
        </div>

        <div class="card">
            <span class="rank">4</span>
            <span class="badge">Movie</span>
            <img src="img/elemental.jpg" draggable="false">
            <div class="rating">⭐ 8.3</div>
            <div class="title">Elementals</div>
        </div>

        <div class="card">
            <span class="rank">5</span>
            <span class="badge">Movie</span>
            <img src="img/500dayssummer.jpg" draggable="false">
            <div class="rating">⭐ 8.6</div>
            <div class="title">(500) Days of Summer</div>
        </div>
        <div class="card">
            <span class="rank">6</span>
            <span class="badge">Movie</span>
            <img src="img/toystory3.jpg" draggable="false">
            <div class="rating">⭐ 9.0</div>
            <div class="title">Toy Story 3</div>
        </div>
        <div class="card">
            <span class="rank">7</span>
            <span class="badge">TV</span>
            <img src="img/aib.jpg" draggable="false">
            <div class="rating">⭐ 8.7</div>
            <div class="title">Alice In Borderland </div>
        </div>
        <div class="card">
            <span class="rank">8</span>
            <span class="badge">Movie</span>
            <img src="img/avengersendgame.jpg" draggable="false">
            <div class="rating">⭐ 8.5 </div>
            <div class="title">Avenger End Game</div>
        </div>
        <div class="card">
            <span class="rank">9</span>
            <span class="badge">TV</span>
            <img src="img/jujutsukaisenarccullinggame.jpg" draggable="false">
            <div class="rating">⭐ 8.8</div>
            <div class="title">Jujutsu Kaisen The Culling Game</div>
        </div>
        <div class="card">
            <span class="rank">10</span>
            <span class="badge">Movie</span>
            <img src="img/tmr.jpg" draggable="false">
            <div class="rating">⭐ 9.0</div>
            <div class="title">The Maze Runner </div>
        </div>
         <div class="card">
            <span class="rank">11</span>
            <span class="badge">Movie</span>
            <img src="img/spiderman.jpg" draggable="false">
            <div class="rating">⭐ 8.8</div>
            <div class="title">Spider-Man: No Way Home</div>
        </div>
         <div class="card">
            <span class="rank">12</span>
            <span class="badge">Movie</span>
            <img src="img/coco.jpg" draggable="false">
            <div class="rating">⭐8.7</div>
            <div class="title">Coco </div>
        </div>
         <div class="card">
            <span class="rank">13</span>
            <span class="badge">Movie</span>
            <img src="img/avatar.jpg" draggable="false">
            <div class="rating">⭐ 8.5</div>
            <div class="title">Avatar: Fire and Ash </div>
        </div>
         <div class="card">
            <span class="rank">14</span>
            <span class="badge">Movie</span>
            <img src="img/fallout.jpg" draggable="false">
            <div class="rating">⭐ 8.3</div>
            <div class="title">Fallout </div>
        </div>
         <div class="card">
            <span class="rank">15</span>
            <span class="badge">Movie</span>
            <img src="img/jumbo.jpg" draggable="false">
            <div class="rating">⭐ 8.0</div>
            <div class="title">Jumbo</div>
        </div>
        

    </div>
</div>

<div class="section">
    <div class="section-header">
        <h2>Most Rated Movie</h2>
        <a href="/movie" class="btn-view-all">View All ➤</a>
    </div>
    <div class="movie-list">
    
        <div class="card">
            <span class="rank">1</span>
            <span class="badge">Movie</span>
            <img src="img/shawshank.jpg"draggable="false">
            <div class="rating">⭐ 9.3 (3.2M)</div>
            <div class="title">The Shawshank Redemption (1994)</div>
        </div>

        <div class="card">
            <span class="rank">2</span>
            <span class="badge">Movie</span>
            <img src="img/godfather.jpg" draggable="false">
            <div class="rating">⭐ 9.2 (2.2M)</div>
            <div class="title">	The Godfather</div>
        </div>

         <div class="card">
            <span class="rank">3</span>
            <span class="badge">Movie</span>
            <img src="img/batman.jpg" draggable="false">
            <div class="rating">⭐ 9.1 (3.2M)</div>
            <div class="title">	The Dark Knight </div>
        </div>

         <div class="card">
            <span class="rank">4</span>
            <span class="badge">Movie</span>
            <img src="img/godfather2.jpg" draggable="false">
            <div class="rating">⭐ 9.0 (1.5M)</div>
            <div class="title">	The Godfather Part II</div>
        </div>


         <div class="card">
            <span class="rank">5</span>
            <span class="badge">Movies</span>
            <img src="img/12angrymen.jpg" draggable="false">
            <div class="rating">⭐ 9.0 (981K)</div>
            <div class="title">	12 Angry Men</div>
        </div>
        <div class="card">
            <span class="rank">6</span>
            <span class="badge">Movies</span>
            <img src="img/tlotrtrotk.jpg" draggable="false">
            <div class="rating">⭐ 9.0 (2.2M)</div>
            <div class="title">	The Lord of the Rings: The Return of the King</div>
        </div>
        <div class="card">
            <span class="rank">7</span>
            <span class="badge">Movies</span>
            <img src="img/sl.jpg" draggable="false">
            <div class="rating">⭐ 9.0 (1.6M) </div>
            <div class="title">Schindler's List	</div>
        </div>
        <div class="card">
            <span class="rank">8</span>
            <span class="badge">Movies</span>
            <img src="img/tlotrtfotr.jpg" draggable="false">
            <div class="rating">⭐ 8.9 (2.2M) </div>
            <div class="title">	The Lord of the Rings: The Fellowship of the Ring</div>
        </div>
        <div class="card">
            <span class="rank">9</span>
            <span class="badge">Movies</span>
            <img src="img/pulp.jpg" draggable="false">
            <div class="rating">⭐ 8.8 (2.4M) </div>
            <div class="title">Pulp Fiction	</div>
        </div>
        <div class="card">
            <span class="rank">10</span>
            <span class="badge">Movies</span>
            <img src="img/tgtbatu.jpg" draggable="false">
            <div class="rating">⭐ 8.8 (890K) </div>
            <div class="title">The Good, the Bad and the Ugly</div>
        </div>
        <div class="card">
            <span class="rank">11</span>
            <span class="badge">Movies</span>
            <img src="img/mrbean.jpg" draggable="false">
            <div class="rating">⭐ 6.4 (2M) </div>
            <div class="title">Mr. Bean's Holiday</div>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-header">
        <h2>Anime</h2>
        <a href="/anime" class="btn-view-all">View All ➤</a>
    </div>
    <div class="movie-list">
    
        <div class="card">
            <span class="rank">1</span>
            <span class="badge">TV</span>
            <img src="img/frieren.jpg" draggable="false">
            <div class="rating">⭐9.27 </div>
            <div class="title">Sousou no Frieren</div>
        </div>

        <div class="card">
            <span class="rank">2</span>
            <span class="badge">TV</span>
            <img src="img/fma.jpg" draggable="false">
            <div class="rating">⭐ 9.11</div>
            <div class="title">Fullmetal Alchemist: Brotherhood</div>
        </div>

         <div class="card">
            <span class="rank">3</span>
            <span class="badge">Movie</span>
            <img src="img/chainsawman.jpg" draggable="false">
            <div class="rating">⭐ 9.08</div>
            <div class="title">Chainsaw Man Movie: Reze-hen </div>
        </div>

         <div class="card">
            <span class="rank">4</span>
            <span class="badge">TV</span>
            <img src="img/steinsgate.jpg" draggable="false">
            <div class="rating">⭐ 9.07</div>
            <div class="title">Steins;Gate</div>
        </div>


         <div class="card">
            <span class="rank">5</span>
            <span class="badge">TV</span>
            <img src="img/snks3p2.jpg" draggable="false">
            <div class="rating">⭐ 9.0</div>
            <div class="title">Shingeki no Kyojin Season 3 Part 2</div>
        </div>

        <div class="card">
            <span class="rank">6</span>
            <span class="badge">TV</span>
            <img src="img/hunterxhunter.jpg" draggable="false">
            <div class="rating">⭐9.03</div>
            <div class="title">Hunter x Hunter (2011)</div>
        </div>

        <div class="card">
            <span class="rank">7</span>
            <span class="badge">OVA</span>
            <img src="img/ged.jpg" draggable="false">
            <div class="rating">⭐ 9.02</div>
            <div class="title">Ginga Eiyuu Densetsu</div>
        </div>

         <div class="card">
            <span class="rank">8</span>
            <span class="badge">TV</span>
            <img src="img/Kaguyaur.jpg" draggable="false">
            <div class="rating">⭐ 8.96</div>
            <div class="title">Kaguya-sama wa Kokurasetai: Ultra Romantic </div>
        </div>

         <div class="card">
            <span class="rank">9</span>
            <span class="badge">Movie</span>
            <img src="img/koenokatachi.jpg" draggable="false">
            <div class="rating">⭐ 8.93</div>
            <div class="title">Koe no Katachi</div>
        </div>


         <div class="card">
            <span class="rank">10</span>
            <span class="badge">TV</span>
            <img src="img/monster.jpg" draggable="false">
            <div class="rating">⭐ 8.86</div>
            <div class="title">Monster</div>
        </div>
        <div class="card">
            <span class="rank">11</span>
            <span class="badge">Movie</span>
            <img src="img/kiminonawa.jpg" draggable="false">
            <div class="rating">⭐8.5</div>
            <div class="title">Kimi No Nawa</div>
        </div>

        <div class="card">
            <span class="rank">12</span>
            <span class="badge">ONA</span>
            <img src="img/tensura.jpg" draggable="false">
            <div class="rating">⭐ 8.7</div>
            <div class="title">Tensei Shitara Slime Datta Ken Season 4</div>
        </div>

         <div class="card">
            <span class="rank">13</span>
            <span class="badge">ONA</span>
            <img src="img/takopi.jpg" draggable="false">
            <div class="rating">⭐ 8.76</div>
            <div class="title">Takopi no Genzai </div>
        </div>

         <div class="card">
            <span class="rank">14</span>
            <span class="badge">ONA</span>
            <img src="img/cote4.jpg" draggable="false">
            <div class="rating">⭐ 8.22</div>
            <div class="title">Youkoso Jitsuryoku Shijou Shugi no Kyoushitsu e 4th Season: 2-nensei-hen 1 Gakki</div>
        </div>


         <div class="card">
            <span class="rank">15</span>
            <span class="badge">TV</span>
            <img src="img/danganronpa.jpg" draggable="false">
            <div class="rating">⭐ 7.19</div>
            <div class="title">Danganronpa: Kibou no Gakuen to Zetsubou no Koukousei The Animation</div>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-header">
        <h2>Disney Pixar</h2>
        <a href="/pixar" class="btn-view-all">View All ➤</a>
    </div>
    <div class="movie-list">
    
         <div class="card">
            <span class="rank">1</span>
            <span class="badge">Movie</span>
            <img src="img/toystory3.jpg" draggable="false">
            <div class="rating">⭐ 9.0</div>
            <div class="title">Toy Story 3</div>
        </div>

        <div class="card">
            <span class="rank">2</span>
            <span class="badge">Movie</span>
            <img src="img/elemental.jpg" draggable="false">
            <div class="rating">⭐ 8.3</div>
            <div class="title">Elementals</div>
        </div>

         <div class="card">
            <span class="rank">3</span>
            <span class="badge">Movie</span>
            <img src="img/coco.jpg" draggable="false">
            <div class="rating">⭐8.7</div>
            <div class="title">Coco </div>
        </div>

         <div class="card">
            <span class="rank">4</span>
            <span class="badge">Movie</span>
            <img src="img/up.jpg" draggable="false">
            <div class="rating">⭐ 8.3</div>
            <div class="title">Up</div>
        </div>


         <div class="card">
            <span class="rank">5</span>
            <span class="badge">Movie</span>
            <img src="img/wildrobot.jpg" draggable="false">
            <div class="rating">⭐ 8.2</div>
            <div class="title">The Wild Robot</div>
        </div>

        <div class="card">
            <span class="rank">6</span>
            <span class="badge">Movie</span>
            <img src="img/ratatouille.jpg" draggable="false">
            <div class="rating">⭐8.1</div>
            <div class="title">Ratatouille</div>
        </div>

        <div class="card">
            <span class="rank">7</span>
            <span class="badge">Movie</span>
            <img src="img/moana2.jpg" draggable="false">
            <div class="rating">⭐ 7.6</div>
            <div class="title">Moana 2</div>
        </div>

         <div class="card">
            <span class="rank">8</span>
            <span class="badge">Movie</span>
            <img src="img/bighero6.jpg" draggable="false">
            <div class="rating">⭐ 7.8</div>
            <div class="title">Big Hero 6 </div>
        </div>

         <div class="card">
            <span class="rank">9</span>
            <span class="badge">Movie</span>
            <img src="img/findingnemo.jpeg" draggable="false">
            <div class="rating">⭐ 8.2</div>
            <div class="title">Finding Nemo</div>
        </div>


         <div class="card">
            <span class="rank">10</span>
            <span class="badge">Movie</span>
            <img src="img/cars.jpg" draggable="false">
            <div class="rating">⭐ 7.3</div>
            <div class="title">Cars</div>
        </div>
        <div class="card">
            <span class="rank">11</span>
            <span class="badge">Movie</span>
            <img src="img/Wreckitralphposter.jpeg" draggable="false">
            <div class="rating">⭐7.7</div>
            <div class="title">Wreck-It Ralph</div>
        </div>

        <div class="card">
            <span class="rank">12</span>
            <span class="badge">Movie</span>
            <img src="img/tangled.jpg" draggable="false">
            <div class="rating">⭐ 7.7</div>
            <div class="title">Tangled</div>
        </div>

         <div class="card">
            <span class="rank">13</span>
            <span class="badge">Movie</span>
            <img src="img/frozen.jpeg" draggable="false">
            <div class="rating">⭐ 7.4</div>
            <div class="title">Frozen</div>
        </div>

         <div class="card">
            <span class="rank">14</span>
            <span class="badge">Movie</span>
            <img src="img/iceage.jpg" draggable="false">
            <div class="rating">⭐ 7.5</div>
            <div class="title">Ice Age</div>
        </div>


         <div class="card">
            <span class="rank">15</span>
            <span class="badge">Movie</span>
            <img src="img/madagascar.jpg" draggable="false">
            <div class="rating">⭐ 6.9</div>
            <div class="title">Madagascar</div>
        </div>
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
            <p><strong>Dosen Pembimbing:</strong>Winda Kurnia Sari, S.Si., M.kom.</p>
        </div>

        <p class="social-text">
            Follow us:

            <a href="https://instagram.com/m.rizkials" target="_blank" class="ig">
                <svg viewBox="0 0 24 24" class="icon">
                    <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm5 5.5A4.5 4.5 0 1 1 7.5 12 4.5 4.5 0 0 1 12 7.5zm6.5-.9a1.1 1.1 0 1 1-1.1-1.1 1.1 1.1 0 0 1 1.1 1.1z"/>
                </svg>
                Instagram
            </a>

            <a href="https://tiktok.com/@mrizkials" target="_blank" class="tt">
                <svg viewBox="0 0 24 24" class="icon">
                    <path d="M14 3c.4 2.1 2 3.7 4 4v3a7 7 0 1 1-7-7c.3 0 .7 0 1 .1v3.1a4 4 0 1 0 4 4V3h-2z"/>
                </svg>
                TikTok
            </a>
        </p>
    </div>
</footer>

<script src="{{ asset('app.js') }}"></script>

</body>
</html>
