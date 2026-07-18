<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
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
<div class="profile-wrapper">

   
    <div class="profile-header">

        <div class="profile-info">
            <h2>My Profile 👤</h2>

        
            <h3>{{ Auth::user()->name }}</h3>

           
            <p class="desc">
                King {{ Auth::user()->name }} iss backkk! Kelola pengaturan akun Anda di bawah.
            </p>

           
            <a href="/home" class="btn home-btn">← Back to Home</a>
            <a href="/signin" class="btn signin">Change Account</a>
            <form action="/logout" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn">Logout!</button>
        </form>  
        </div>

       
        <div class="profile-avatar">
           @if(Auth::user()->photo)
            <img src="{{ asset('storage/' . Auth::user()->photo) }}" 
            class="nav-img"
             onclick="openProfileImage(this.src)">
            @endif
        </div>

    </div>

    <div class="profile-grid">

        
        <div class="profile-card">
            <h3>Update Profile ✏️</h3>

            <form action="/profile/update" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="file" name="photo">

                <input type="text" name="name" value="{{ Auth::user()->name }}" required>
                <input type="email" name="email" value="{{ Auth::user()->email }}" required>

                <button class="btn signin">Update Profile</button>
            </form>
        </div>

      
        <div class="profile-card">
            <h3>Security 🔐</h3>

            <form action="/profile/password" method="POST">
                @csrf

                <input type="password" name="old_password" placeholder="Password Lama" required>
                <input type="password" name="new_password" placeholder="Password Baru" required>
                <input type="password" name="new_password_confirmation" placeholder="Konfirmasi Password" required>

                <button class="btn signin">Update Password</button>
            </form>
        </div>

    </div>

</div>

<div id="profileImgModal" class="img-modal" onclick="closeProfileImage()">
    <img id="profileModalImg">
</div>
<div class="loading-sticker">
    <div class="loader"></div>
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

<script>
function openProfileImage(src) {
    document.getElementById("profileImgModal").style.display = "flex";
    document.getElementById("profileModalImg").src = src;
}

function closeProfileImage() {
    document.getElementById("profileImgModal").style.display = "none";
}
</script>

</body>
</html>