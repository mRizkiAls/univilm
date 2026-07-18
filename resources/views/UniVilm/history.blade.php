<!DOCTYPE html>
<html>
<head>
    <title>History</title>

  
    <meta name="csrf-token" content="{{ csrf_token() }}">

   
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




<h2>📜 </h2>
<h2> History</h2>


<div class="movie-list drag-scroll">

@foreach($history as $h)
    <div class="card">

        
        <img src="{{ $h->image }}" draggable="false">

       
        <div class="title">{{ $h->title }}</div>

    
        <small>{{ $h->created_at }}</small>

      
        <button class="btn-delete" data-id="{{ $h->id }}">
            🗑 Delete
        </button>

       
        <button class="btn-edit"
                data-id="{{ $h->id }}"
                data-title="{{ $h->title }}"
                data-image="{{ $h->image }}">
            ✏️ Edit
        </button>

    </div>
@endforeach

</div>


<div id="editModal" class="modal" style="display:none;">
    <div class="modal-content">

        <h3>Edit History</h3>

      
        <input type="hidden" id="edit-id">

      
        <label>Title</label>
        <input type="text" id="edit-title">

        
        <label>Image URL</label>
        <input type="text" id="edit-image">

        <br><br>

    
        <button id="btn-save">💾 Save</button>

      
        <button id="btn-cancel">❌ Cancel</button>

    </div>
</div>

<script>

document.addEventListener("DOMContentLoaded", function () {

    const slider = document.querySelector(".drag-scroll");

    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener("mousedown", (e) => {
        isDown = true;
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });

    slider.addEventListener("mouseup", () => {
        isDown = false;
    });

    slider.addEventListener("mouseleave", () => {
        isDown = false;
    });

    slider.addEventListener("mousemove", (e) => {
        if (!isDown) return;
        e.preventDefault();

        const x = e.pageX - slider.offsetLeft;
        slider.scrollLeft = scrollLeft - (x - startX) * 1.2;
    });


    const modal = document.getElementById("editModal");
    const editId = document.getElementById("edit-id");
    const editTitle = document.getElementById("edit-title");
    const editImage = document.getElementById("edit-image");


    document.addEventListener("click", function (e) {

        if (e.target.closest(".btn-delete")) {

            e.preventDefault();
            e.stopPropagation();

            let btn = e.target.closest(".btn-delete");
            let id = btn.getAttribute("data-id");

            let confirmDelete = confirm("⚠ Apakah kamu yakin ingin menghapus history ini?");

            if (!confirmDelete) {
                showNotif("❌ Delete dibatalkan", "warning");
                return;
            }

            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('/history/' + id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': token
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    btn.closest('.card').remove();
                    showNotif("🗑 History dihapus", "error");
                }
            });

        }


        if (e.target.closest(".btn-edit")) {

            let btn = e.target.closest(".btn-edit");

            editId.value = btn.dataset.id;
            editTitle.value = btn.dataset.title;
            editImage.value = btn.dataset.image;

            modal.style.display = "flex"; // FIX: harus flex biar center
        }

    });


    document.getElementById("btn-cancel").onclick = () => {
        modal.style.display = "none";
    };


    document.getElementById("btn-save").onclick = () => {

        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('/history/' + editId.value, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({
                title: editTitle.value,
                image: editImage.value
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {

                let card = document.querySelector(`.btn-edit[data-id='${editId.value}']`).closest('.card');

                card.querySelector(".title").innerText = editTitle.value;
                card.querySelector("img").src = editImage.value;

                modal.style.display = "none"; // FIX: tutup modal

                showNotif("✏️ History berhasil diupdate", "success");
            }
        });
    };


    window.addEventListener("click", function(e) {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });

});

</script>

</body>
</html>