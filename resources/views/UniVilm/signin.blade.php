<!DOCTYPE html>
<html lang="id">
<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<div class="auth-container">
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

<a href="/home" class="back-home">← Back to Home</a>

<form method="POST" action="/login" class="auth-box">
    @csrf

    <h2>Welcome Back </h2>

    @if(session('error'))
        <p class="error">{{ session('error') }}</p>
    @endif

    <input type="text" name="login" placeholder="Email atau Username" required>
    <input type="password" name="password" placeholder="Password" required>

    <button type="button" class="btn signin" onclick="loginConfirm()">
        Sign In
    </button>

    <p class="switch">
        Belum punya akun? 
        <a href="/signup" onclick="goSignup(event)">Sign Up</a>
    </p>
</form>
</div>

<div id="loginConfirm" class="login-modal">
    <div class="login-box">
        <h3>⚠ Apakah ini akun kamu?</h3>
        <p>Pastikan email & password sudah benar</p>
        <div class="btn-group">
            <button type="button" onclick="submitLogin(this)" class="btn yes">
                Ya, lanjut login
            </button>
            <button type="button" onclick="closeLogin()" class="btn no">
                Batal
            </button>
        </div>
    </div>
</div>

<script>
function loginConfirm() {
    document.getElementById("loginConfirm").style.display = "flex";
}

function closeLogin() {
    document.getElementById("loginConfirm").style.display = "none";
}

function submitLogin(btn) {
    const form = document.querySelector("form.auth-box");
    if (form) {
        form.submit();
    }
}

function goSignup(e) {
    e.preventDefault();
    document.querySelector(".auth-box").classList.add("flip-out");
    setTimeout(() => {
        window.location.href = "/signup";
    }, 600);
}

</script>

</body>
</html>