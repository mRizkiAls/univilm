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
        <img src="img/jar.jpg" draggable="false">
        <img src="img/jur.jpg" draggable="false">
        <img src="img/jir.jpg" draggable="false">
        <img src="img/fririn.jpg" draggable="false">
        <img src="img/sq1.jpg" draggable="false">
    </div>

   
    <button class="prev" onclick="prevSlide()">❮</button>
    <button class="next" onclick="nextSlide()">❯</button>

</div>
<div class="section-divider"></div>
<div class="section">
    <div class="section-header">
        <h2>Trending Now⭐</h2>
        
    </div>
    <div class="movie-list">
        <div class="card">
            <span class="rank">1</span>
            <span class="badge">TV</span>
            <img src="img/trust.jpg" draggable="false">
            <div class="rating">⭐ 8.0(9.8M)</div>
            <div class="title">Trust Me: The False Prophet: Season 1
</div>
        </div>

        <div class="card">
            <span class="rank">2</span>
            <span class="badge">TV</span>
            <img src="img/kitty.jpg" draggable="false">
            <div class="rating">⭐ 8.3(7.8M)</div>
            <div class="title">XO, Kitty: Season 3</div>
        </div>

        <div class="card">
            <span class="rank">3</span>
            <span class="badge">TV</span>
            <img src="img/danny.jpg" draggable="false">
            <div class="rating">⭐ 8.1(5.3M)</div>
            <div class="title">Danny Go!: Season 1</div>
        </div>

        <div class="card">
            <span class="rank">4</span>
            <span class="badge">TV</span>
            <img src="img/spectrum.jpg" draggable="false">
            <div class="rating">⭐ 8.6(5.2M)</div>
            <div class="title">Love on the Spectrum: Season 4</div>
        </div>
        <div class="card">
            <span class="rank">5</span>
            <span class="badge">TV</span>
            <img src="img/onepieces2.jpg" draggable="false">
            <div class="rating">⭐ 9.0(4.9M)</div>
            <div class="title">ONE PIECE: Season 2</div>
        </div>
        <div class="card">
            <span class="rank">6</span>
            <span class="badge">TV</span>
            <img src="img/st.jpg" draggable="false">
            <div class="rating">⭐ 9.11(4.8M)</div>
            <div class="title">Stranger Things S5</div>
        </div>
        <div class="card">
            <span class="rank">7</span>
            <span class="badge">TV</span>
            <img src="img/111111111111.jpg"draggable="false">
            <div class="rating">⭐ 7.7(4.8M)</div>
            <div class="title">Something Very Bad Is Going to Happen: Season 1 </div>
        </div>
        <div class="card">
            <span class="rank">8</span>
            <span class="badge">TV</span>
            <img src="img/raw.jpg"draggable="false">
            <div class="rating">⭐ 7.0(4.7M)</div>
            <div class="title">Raw: 2026 - April 6, 2026</div>
        </div>
        <div class="card">
            <span class="rank">9</span>
            <span class="badge">TV</span>
            <img src="img/big.jpg"draggable="false">
            <div class="rating">⭐ 8.1 (4M)</div>
            <div class="title">Big Mistakes: Season 1</div>
        </div>
        <div class="card">
            <span class="rank">10</span>
            <span class="badge">TV</span>
            <img src="img/salish.jpg"draggable="false">
            <div class="rating">⭐ 7.0 (2.1M)</div>
            <div class="title">Salish & Jordan Matter: Season 1</div>
        </div>
        <div class="card">
            <span class="rank">11</span>
            <span class="badge">TV</span>
            <img src="img/teofw.jpg"draggable="false">
            <div class="rating">⭐ 8.0 (2.1M)</div>
            <div class="title">The End of the F***ing World
        </div>
        </div>



        

    </div>
</div>

<div class="section">
    <div class="section-header">
        <h2>Most Popular Netflix</h2>
    </div>
    <div class="movie-list">
    
        <div class="card">
            <span class="rank">1</span>
            <span class="badge">TV</span>
            <img src="img/st.jpg"draggable="false">
            <div class="rating">⭐ 8.6 (1.7M)</div>
            <div class="title">Stranger Things</div>
        </div>
         <div class="card">
            <span class="rank">2</span>
            <span class="badge">TV</span>
            <img src="img/sq.jpg"draggable="false">
            <div class="rating">⭐ 7.9 (757K)</div>
            <div class="title">Squid Game</div>
        </div>
         <div class="card">
            <span class="rank">3</span>
            <span class="badge">TV</span>
            <img src="img/money.jpg"draggable="false">
            <div class="rating">⭐ 8.2 (605K)</div>
            <div class="title">Money Heist</div>
        </div>
         <div class="card">
            <span class="rank">4</span>
            <span class="badge">TV</span>
            <img src="img/ws.jpg"draggable="false">
            <div class="rating">⭐ 8.0 (495K)</div>
            <div class="title">Wednesday</div>
        </div>
         <div class="card">
            <span class="rank">5</span>
            <span class="badge">TV</span>
            <img src="img/sihir.jpg"draggable="false">
            <div class="rating">⭐ 7.8 (620K)</div>
            <div class="title">The Witcher</div>
        </div>
         <div class="card">
            <span class="rank">6</span>
            <span class="badge">TV</span>
            <img src="img/Bridgerton.jpg"draggable="false">
            <div class="rating">⭐ 7.5 (227K)</div>
            <div class="title">Bridgerton</div>
        </div>
         <div class="card">
            <span class="rank">7</span>
            <span class="badge">TV</span>
            <img src="img/you.jpg"draggable="false">
            <div class="rating">⭐ 7.6 (366K)</div>
            <div class="title">You</div>
        </div>
         <div class="card">
            <span class="rank">8</span>
            <span class="badge">TV</span>
            <img src="img/Manifest.jpg"draggable="false">
            <div class="rating">⭐ 7.0 (104K)</div>
            <div class="title">Manifest</div>
        </div>
        <div class="card">
            <span class="rank">9</span>
            <span class="badge">TV</span>
            <img src="img/13 Reasons Why.jpg"draggable="false">
            <div class="rating">⭐ 7.4 (339K)</div>
            <div class="title">13 Reasons Why</div>
        </div>
        <div class="card">
            <span class="rank">10</span>
            <span class="badge">TV</span>
            <img src="img/Monster1.jpg"draggable="false">
            <div class="rating">⭐ 7.7 (223K)</div>
            <div class="title">Monster</div>
        </div>
        <div class="card">
            <span class="rank">11</span>
            <span class="badge">TV</span>
            <img src="img/bbb.jpg"draggable="false">
            <div class="rating">⭐ 7.4 (339K)</div>
            <div class="title">Boboiboy</div>
        </div> 
        <div class="card">
            <span class="rank">12</span>
            <span class="badge">TV</span>
            <img src="img/lucifer.jpg"draggable="false">
            <div class="rating">⭐ 8.0 (391K)</div>
            <div class="title">Lucifer</div>
        </div>
        
        <div class="card">
            <span class="rank">11</span>
            <span class="badge">TV</span>
            <img src="img/teofw.jpg"draggable="false">
            <div class="rating">⭐ 8.0 (2.1M)</div>
            <div class="title">The End of the F***ing World
</div>
        </div>
         <div class="card">
            <span class="rank">12</span>
            <span class="badge">TV</span>
            <img src="img/aib.jpg" draggable="false">
            <div class="rating">⭐ 8.7(1M)</div>
            <div class="title">Alice In Borderland </div>
        </div>

        

        
    </div>
</div>



<div class="section">
    <div class="section-header">
        <h2>Anime</h2>   
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
            <span class="badge">TV</span>
            <img src="img/steinsgate.jpg" draggable="false">
            <div class="rating">⭐ 9.07</div>
            <div class="title">Steins;Gate</div>
        </div>


         <div class="card">
            <span class="rank">4</span>
            <span class="badge">TV</span>
            <img src="img/snks3p2.jpg" draggable="false">
            <div class="rating">⭐ 9.0</div>
            <div class="title">Shingeki no Kyojin Season 3 Part 2</div>
        </div>

        <div class="card">
            <span class="rank">5</span>
            <span class="badge">TV</span>
            <img src="img/hunterxhunter.jpg" draggable="false">
            <div class="rating">⭐9.03</div>
            <div class="title">Hunter x Hunter (2011)</div>
        </div>

    

         <div class="card">
            <span class="rank">6</span>
            <span class="badge">TV</span>
            <img src="img/Kaguyaur.jpg" draggable="false">
            <div class="rating">⭐ 8.96</div>
            <div class="title">Kaguya-sama wa Kokurasetai: Ultra Romantic </div>
        </div>

      


         <div class="card">
            <span class="rank">7</span>
            <span class="badge">TV</span>
            <img src="img/monster.jpg" draggable="false">
            <div class="rating">⭐ 8.86</div>
            <div class="title">Monster</div>
        </div>
     

        

         <div class="card">
            <span class="rank">8</span>
            <span class="badge">TV</span>
            <img src="img/takopi.jpg" draggable="false">
            <div class="rating">⭐ 8.76</div>
            <div class="title">Takopi no Genzai </div>
        </div>

         <div class="card">
            <span class="rank">9</span>
            <span class="badge">TV</span>
            <img src="img/danganronpa.jpg" draggable="false">
            <div class="rating">⭐ 7.19</div>
            <div class="title">Danganronpa: Kibou no Gakuen to Zetsubou no Koukousei The Animation</div>
        </div>
         <div class="card">
            <span class="rank">10</span>
            <span class="badge">TV</span>
            <img src="img/wis.jpg" draggable="false">
            <div class="rating">⭐ 7.85</div>
            <div class="title">Wistoria: Wand and Sword</div>
        </div>
           <div class="card">
            <span class="rank">11</span>
            <span class="badge">TV</span>
            <img src="img/dn.jpg" draggable="false">
            <div class="rating">⭐ 8.62</div>
            <div class="title">Death Note</div>
        </div>
           <div class="card">
            <span class="rank">12</span>
            <span class="badge">TV</span>
            <img src="img/saiki.jpg" draggable="false">
            <div class="rating">⭐ 8.41</div>
            <div class="title">Saiki Kusuo no Ψ-nan</div>
        </div>
           <div class="card">
            <span class="rank">13</span>
            <span class="badge">TV</span>
            <img src="img/fmnae.jpg" draggable="false">
            <div class="rating">⭐ 8.35</div>
            <div class="title">Fumetsu no Anata e</div>
        </div>
           <div class="card">
            <span class="rank">14</span>
            <span class="badge">TV</span>
            <img src="img/ngnl.jpg" draggable="false">
            <div class="rating">⭐ 8.03</div>
            <div class="title">No Game No Life</div>
        </div>
           <div class="card">
            <span class="rank">15</span>
            <span class="badge">TV</span>
            <img src="img/tensura1.jpg" draggable="false">
            <div class="rating">⭐ 8.13</div>
            <div class="title">Tensei shitara Slime Datta Ken</div>
        </div>
           <div class="card">
            <span class="rank">16</span>
            <span class="badge">TV</span>
            <img src="img/cunibyu.jpg" draggable="false">
            <div class="rating">⭐ 7.7</div>
            <div class="title">Chuunibyou demo Koi ga Shitai!</div>
        </div>
           <div class="card">
            <span class="rank">17</span>
            <span class="badge">TV</span>
            <img src="img/bunnygirl.jpg" draggable="false">
            <div class="rating">⭐ 8.23</div>
            <div class="title">Seishun Buta Yarou wa Bunny Girl Senpai no Yume wo Minai</div>
        </div>
           <div class="card">
            <span class="rank">18</span>
            <span class="badge">TV</span>
            <img src="img/86578.jpg" draggable="false">
            <div class="rating">⭐ 7.21</div>
            <div class="title">Kakegurui</div>
        </div>
           <div class="card">
            <span class="rank">19</span>
            <span class="badge">TV</span>
            <img src="img/75639.jpg" draggable="false">
            <div class="rating">⭐ 8.07</div>
            <div class="title">Ansatsu Kyoushitsu</div>
        </div>
           <div class="card">
            <span class="rank">20</span>
            <span class="badge">TV</span>
            <img src="img/103005.jpg" draggable="false">
            <div class="rating">⭐ 8.78</div>
            <div class="title">Vinland Saga(maharaja thorfin)</div>
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
