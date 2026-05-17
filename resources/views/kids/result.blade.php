<!DOCTYPE html>
<html>
<head>
    <title>Quiz Result</title>

    <style>
        body {
            font-family: Arial;
            background: #fff3d6;
            text-align: center;
            padding: 50px;
        }

        .box {
            background: white;
            padding: 40px;
            border-radius: 20px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 5px 12px rgba(0,0,0,0.15);
        }

        h1 {
            color: #ff7a00;
        }

        .score {
            font-size: 40px;
            font-weight: bold;
            color: #4A90E2;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            background: #F5C542;
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="box">
    <h1>Quiz Finished!</h1>

    <p>Your Score</p>

    <div class="score">
        {{ $score }} / {{ $total }}
    </div>

    

    <!-- Try Again Button -->
    <a href="/kids-quiz" style="
        display:inline-block;
        padding:12px 20px;
        margin-right:10px;
        background:#4caf50;
        color:white;
        text-decoration:none;
        border-radius:8px;">
        Try Again
    </a>

    <!-- Back to Parent Dashboard -->
    <a href="/parent" style="
        display:inline-block;
        padding:12px 20px;
        background:#2196f3;
        color:white;
        text-decoration:none;
        border-radius:8px;">
        Back to Parent Dashboard
    </a>

</div>
</div>

</body>
</html>