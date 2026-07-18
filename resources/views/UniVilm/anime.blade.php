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
         <img src="img/tensura2.jpg" draggable="false">
         <img src="img/jujurkasian.jpg" draggable="false">
        <img src="img/polar.jpg" draggable="false">
       
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
        <h2>Most Rated Movie</h2>
   
    </div>
    <div class="movie-list">
    
       <div class="card">
            <span class="rank">1</span>
            <span class="badge">Movie</span>
            <img src="img/chainsawman.jpg" draggable="false">
            <div class="rating">⭐ 9.08</div>
            <div class="title">Chainsaw Man Movie: Reze-hen</div>
        </div>

        <div class="card">
            <span class="rank">2</span>
            <span class="badge">Movie</span>
            <img src="img/koenokatachi.jpg" draggable="false">
            <div class="rating">⭐ 8.93</div>
            <div class="title">Koe no Katachi</div>
        </div>

        <div class="card">
            <span class="rank">3</span>
            <span class="badge">Movie</span>
            <img src="img/kiminonawa.jpg" draggable="false">
            <div class="rating">⭐ 8.5</div>
            <div class="title">Kimi No Nawa</div>
        </div>

        <div class="card">
            <span class="rank">4</span>
            <span class="badge">Movie</span>
            <img src="img/tunnelsummer.jpg" draggable="false">
            <div class="rating">⭐ 8.2</div>
            <div class="title">The Tunnel to Summer, the Exit of Goodbyes</div>
        </div>

        <div class="card">
            <span class="rank">5</span>
            <span class="badge">Movie</span>
            <img src="img/summerghost.jpg" draggable="false">
            <div class="rating">⭐ 7.0</div>
            <div class="title">Summer Ghost</div>
        </div>

        <div class="card">
            <span class="rank">6</span>
            <span class="badge">Movie</span>
            <img src="img/kokoro.jpg" draggable="false">
            <div class="rating">⭐ 7.2</div>
            <div class="title">Kokoro ga Sakebitagatterunda.</div>
        </div>
        <div class="card">
            <span class="rank">7</span>
            <span class="badge">Movie</span>
            <img src="img/jose.jpg" draggable="false">
            <div class="rating">⭐ 8.38</div>
            <div class="title">Josee, the Tiger and the Fish</div>
        </div>
        <div class="card">
            <span class="rank">8</span>
            <span class="badge">Movie</span>
            <img src="img/helloworld.jpg" draggable="false">
            <div class="rating">⭐ 7.49</div>
            <div class="title">Hello World</div>
        </div>
        <div class="card">
            <span class="rank">9</span>
            <span class="badge">Movie</span>
            <img src="img/whiskeraway.jpg" draggable="false">
            <div class="rating">⭐ 7.36</div>
            <div class="title">A Whisker Away</div>
        </div>
        <div class="card">
            <span class="rank">10</span>
            <span class="badge">Movie</span>
            <img src="img/tenkinoko.jpg" draggable="false">
            <div class="rating">⭐ 8.27</div>
            <div class="title">Weathering with You</div>
        </div>
        <div class="card">
            <span class="rank">11</span>
            <span class="badge">Movie</span>
            <img src="img/suzume.jpg" draggable="false">
            <div class="rating">⭐ 8.24</div>
            <div class="title">Suzume</div>
        </div>
        <div class="card">
            <span class="rank">12</span>
            <span class="badge">Movie</span>
            <img src="img/knyinfinitecastle.jpg" draggable="false">
            <div class="rating">⭐ 8.67</div>
            <div class="title">Demon Slayer: Kimetsu no Yaiba - The Movie: Infinity Castle - Part 1: Akaza Returns</div>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-header">
        <h2>TV</h2>
      
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
            <span class="badge">ONA</span>
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

<div class="section">
    <div class="section-header">
        <h2>On Going</h2>
        
    </div>
    <div class="movie-list">
    
         <div class="card">
            <span class="rank">1</span>
            <span class="badge">ONA</span>
            <img src="img/tongari.jpg" draggable="false">
            <div class="rating">⭐ 8.78</div>
            <div class="title">Tongari Boushi no Atelier</div>
        </div>
         <div class="card">
            <span class="rank">2</span>
            <span class="badge">ONA</span>
            <img src="img/rezero.jpg" draggable="false">
            <div class="rating">⭐ 8.81</div>
            <div class="title">Re:Zero kara Hajimeru Isekai Seikatsu 4th Season</div>
        </div>
          <div class="card">
            <span class="rank">3</span>
            <span class="badge">ONA</span>
            <img src="img/tensura.jpg" draggable="false">
            <div class="rating">⭐ 8.7</div>
            <div class="title">Tensei Shitara Slime Datta Ken Season 4</div>
        </div>
         <div class="card">
            <span class="rank">4</span>
            <span class="badge">ONA</span>
            <img src="img/cote4.jpg" draggable="false">
            <div class="rating">⭐ 8.22</div>
            <div class="title">Youkoso Jitsuryoku Shijou Shugi no Kyoushitsu e 4th Season: 2-nensei-hen 1 Gakki</div>
        </div>
         <div class="card">
            <span class="rank">5</span>
            <span class="badge">ONA</span>
            <img src="img/otonari.jpg" draggable="false">
            <div class="rating">⭐ 8.02</div>
            <div class="title">Otonari no Tenshi-sama ni Itsunomanika Dame Ningen ni Sareteita Ken 2</div>
        </div>
         <div class="card">
            <span class="rank">6</span>
            <span class="badge">ONA</span>
            <img src="img/drstone.jpg" draggable="false">
            <div class="rating">⭐ 8.29</div>
            <div class="title">Dr. Stone: Science Future Part 3</div>
        </div>
         <div class="card">
            <span class="rank">7</span>
            <span class="badge">ONA</span>
            <img src="img/wistoria.jpg" draggable="false">
            <div class="rating">⭐ 8.07</div>
            <div class="title">Tsue to Tsurugi no Wistoria Season 2</div>
        </div>
         <div class="card">
            <span class="rank">8</span>
            <span class="badge">ONA</span>
            <img src="img/marima.jpg" draggable="false">
            <div class="rating">⭐ 8.04</div>
            <div class="title">Mairimashita! Iruma-kun 4th Season</div>
        </div>
         <div class="card">
            <span class="rank">9</span>
            <span class="badge">ONA</span>
            <img src="img/koori.jpg" draggable="false">
            <div class="rating">⭐ 7.7</div>
            <div class="title">Koori no Jouheki</div>
        </div>
         <div class="card">
            <span class="rank">10</span>
            <span class="badge">ONA</span>
            <img src="img/biru.jpg" draggable="false">
            <div class="rating">⭐ 8.01</div>
            <div class="title">Honzuki no Gekokujou: Shisho ni Naru Tame ni wa Shudan wo Erandeiraremasen - Ryoushu no Youjo</div>
        </div>
         <div class="card">
            <span class="rank">11</span>
            <span class="badge">ONA</span>
            <img src="img/killau.jpg" draggable="false">
            <div class="rating">⭐ 7.50</div>
            <div class="title">Kill Ao</div>
        </div>
        
        

        
    </div>
</div>
<div class="section">
    <div class="section-header">
        <h2>OVA</h2>
    
    </div>
    <div class="movie-list">
    
          <div class="card">
            <span class="rank">1</span>
            <span class="badge">OVA</span>
            <img src="img/ged.jpg" draggable="false">
            <div class="rating">⭐ 9.02</div>
            <div class="title">Ginga Eiyuu Densetsu</div>
        </div>

        <div class="card">
            <span class="rank">2</span>
            <span class="badge">OVA</span>
            <img src="img/cur.jpg" draggable="false">
            <div class="rating">⭐ 8.69</div>
            <div class="title">Rurouni Kenshin: Meiji Kenkaku Romantan - Tsuioku-hen</div>
        </div>
        <div class="card">
            <span class="rank">3</span>
            <span class="badge">OVA</span>
            <img src="img/aot.jpg" draggable="false">
            <div class="rating">⭐ 8.42</div>
            <div class="title">Shingeki no Kyojin: Kuinaki Sentaku</div>
        </div>
        <div class="card">
            <span class="rank">4</span>
            <span class="badge">OVA</span>
            <img src="img/ddd.jpg" draggable="false">
            <div class="rating">⭐ 8.41</div>
            <div class="title">Kamisama Hajimemashita: Kako-henu</div>
        </div>
        <div class="card">
            <span class="rank">5</span>
            <span class="badge">OVA</span>
            <img src="img/gintama.jpg" draggable="false">
            <div class="rating">⭐ 8.38</div>
            <div class="title">Gintama°: Aizome Kaori-hen</div>
        </div>
        <div class="card">
            <span class="rank">6</span>
            <span class="badge">OVA</span>
            <img src="img/hell.jpg" draggable="false">
            <div class="rating">⭐ 8.34</div>
            <div class="title">Hellsing Ultimate</div>
        </div>
        <div class="card">
            <span class="rank">7</span>
            <span class="badge">OVA</span>
            <img src="img/kidou.jpg" draggable="false">
            <div class="rating">⭐ 8.33</div>
            <div class="title">Kidou Senshi Gundam: The Origin</div>
        </div>
        
    </div>
</div>
<footer class="footer">
    <div class="footer-content">
        <div class="logo">UniVilm</div>

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
