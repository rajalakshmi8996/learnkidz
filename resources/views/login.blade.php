<!DOCTYPE html>
<html>
<head>
    <title>Login - LearnKidz</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f7fb;
            margin: 0;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .left {
            flex: 1;
            background: #4A90E2;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .left h1 {
            font-size: 40px;
        }

        .right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 300px;
        }

        .login-box h2 {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #F5C542;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: bold;
        }

        a {
            display: block;
            margin-top: 10px;
            text-align: center;
            text-decoration: none;
            color: #4A90E2;
        }
    </style>
</head>

<body>

<div class="container">

    <!-- LEFT SIDE -->
    <div class="left">
        <h1>🧩 LearnKidz</h1>
        <p>Smart Learning Through Play</p>
    </div>

    <!-- RIGHT SIDE -->
    <div class="right">
        <div class="login-box">

            <h2>Login</h2>
<form method="POST" action="/login">
    @csrf

    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">

    <button type="submit">Login</button>
</form>

            <a href="/">Back to Home</a>

        </div>
       
    </div>

</div>

</body>
</html>