<!DOCTYPE html>
<html>
<head>
    <title>Leaderboard</title>
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
 

        <h2>🏆 </h2>
        <h2>Leaderboard</h2>


<div class="movie-list drag-scroll">

@php $rank = 1; @endphp

@foreach($top as $t)
    <div class="card">

    <span class="rank">#{{ $rank++ }}</span>

    <img src="{{ $t->image ? asset($t->image) : asset('img/default.jpg') }}" draggable="false">

    <div class="title">{{ $t->title }}</div>

    <div class="rating">
        👁 Watched: {{ $t->total }}x
    </div>

</div>
@endforeach

</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const slider = document.querySelector(".drag-scroll");

    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener("mousedown", (e) => {
        isDown = true;
        slider.classList.add("active");

        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });

    slider.addEventListener("mouseleave", () => {
        isDown = false;
        slider.classList.remove("active");
    });

    slider.addEventListener("mouseup", () => {
        isDown = false;
        slider.classList.remove("active");
    });

    slider.addEventListener("mousemove", (e) => {
        if (!isDown) return;
        e.preventDefault();

        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 1.2;

        slider.scrollLeft = scrollLeft - walk;
    });

});
</script>
</body>
</html>