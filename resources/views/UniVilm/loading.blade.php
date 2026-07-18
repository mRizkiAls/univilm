<!DOCTYPE html>
<html>
<head>
    <title>Loading...</title>
    <style>
        body {
            margin: 0;
            background: #1a345c;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            font-family: Arial;
        }

        .loader {
            position: relative;
            width: 120px;
            height: 40px;
        }

        
        .body {
            width: 60px;
            height: 20px;
            background: black;
            border-radius: 20px;
            position: absolute;
            top: 10px;
            left: 30px;
            animation: move 0.4s linear infinite;
        }

        
        .head {
            width: 20px;
            height: 20px;
            background: black;
            border-radius: 50%;
            position: absolute;
            top: 10px;
            left: 80px;
        }

      
        .line {
            position: absolute;
            width: 40px;
            height: 4px;
            background: black;
            opacity: 0.5;
            left: -50px;
            animation: speed 0.6s linear infinite;
        }

        .line:nth-child(1) { top: 5px; animation-delay: 0s; }
        .line:nth-child(2) { top: 15px; animation-delay: 0.2s; }
        .line:nth-child(3) { top: 25px; animation-delay: 0.4s; }

        @keyframes speed {
            0% { left: -60px; opacity: 0; }
            50% { opacity: 1; }
            100% { left: 120px; opacity: 0; }
        }

        @keyframes move {
            0% { transform: translateX(0); }
            100% { transform: translateX(5px); }
        }

        .text {
            position: absolute;
            bottom: -40px;
            width: 100%;
            text-align: center;
            color: black;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="loader">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>

    <div class="body"></div>
    <div class="head"></div>

    <div class="text">LOADING...</div>
</div>

<script>
    setTimeout(() => {
        window.location.href = "/signin";
    }, 5000);
</script>

</body>
</html>