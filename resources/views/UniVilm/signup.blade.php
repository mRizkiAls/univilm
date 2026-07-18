<!DOCTYPE html>
<html lang="id">
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
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

<a href="/" class="back-home">← Back to Home</a>

<form method="POST" action="/register" class="auth-box">
    @csrf

    <h2>Create Account</h2>

    <input type="text" name="name" placeholder="Nama" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>

    <button type="submit" class="btn signup">Sign Up</button>

    <p class="switch">
        Sudah punya akun? 
        <a href="/signin" onclick="goSignin(event)">Sign In</a>
    </p>
</form>
</div>

<script>
function goSignin(e) {
    e.preventDefault();
    document.querySelector(".auth-box").classList.add("flip-out");
    setTimeout(() => {
        window.location.href = "/signin";
    }, 600);
}
</script>

</body>
</html>