<!DOCTYPE html>
<html>
<head>
    <title>LearnKidz</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            color: white;
            overflow-x: hidden;
            background:
                radial-gradient(circle at 20% 20%, rgba(0, 200, 255, 0.35), transparent 25%),
                radial-gradient(circle at 80% 30%, rgba(255, 0, 200, 0.25), transparent 25%),
                radial-gradient(circle at 50% 80%, rgba(255, 230, 0, 0.18), transparent 25%),
                linear-gradient(135deg, #060b2d, #11145c, #24105f);
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background-image:
                radial-gradient(white 1px, transparent 1px),
                radial-gradient(white 1px, transparent 1px);
            background-size: 45px 45px, 80px 80px;
            background-position: 0 0, 20px 30px;
            opacity: 0.45;
            animation: stars 30s linear infinite;
            z-index: -2;
        }

        @keyframes stars {
            from { transform: translateY(0); }
            to { transform: translateY(-200px); }
        }

        .planet {
            position: fixed;
            width: 180px;
            height: 180px;
            right: -40px;
            top: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ffb347, #ff5e7e);
            box-shadow: 0 0 50px rgba(255, 120, 120, 0.6);
            z-index: -1;
        }

        .planet::after {
            content: "";
            position: absolute;
            width: 250px;
            height: 45px;
            border: 8px solid rgba(255,255,255,0.35);
            border-radius: 50%;
            top: 65px;
            left: -35px;
            transform: rotate(-20deg);
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 22px 55px;
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(255,255,255,0.15);
        }

        .logo {
            font-size: 28px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 22px;
            font-weight: 500;
            padding: 9px 15px;
            border-radius: 20px;
        }

        nav a:hover {
            background: rgba(255,255,255,0.18);
        }

        .hero {
            min-height: 82vh;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
            padding: 60px 9%;
        }

        .hero-text {
            max-width: 580px;
        }

        .tag {
            display: inline-block;
            background: rgba(255,255,255,0.16);
            padding: 10px 18px;
            border-radius: 30px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        .hero h1 {
            font-size: 58px;
            line-height: 1.1;
            margin: 0;
        }

        .hero h1 span {
            color: #ffe66d;
        }

        .hero p {
            font-size: 18px;
            line-height: 1.7;
            color: #e8ecff;
            margin: 22px 0 35px;
        }

        .buttons a {
            display: inline-block;
            text-decoration: none;
            padding: 15px 28px;
            border-radius: 35px;
            margin-right: 15px;
            font-weight: 700;
        }

        .primary {
            background: #ffe66d;
            color: #10134b;
            box-shadow: 0 10px 25px rgba(255,230,109,0.35);
        }

        .secondary {
            border: 2px solid white;
            color: white;
        }

        .space-card {
            width: 330px;
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 32px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 25px 50px rgba(0,0,0,0.25);
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-18px); }
        }

        .rocket {
            font-size: 95px;
            margin-bottom: 15px;
        }

        .space-card h2 {
            margin: 5px 0;
            font-size: 26px;
        }

        .space-card p {
            color: #eef2ff;
            line-height: 1.6;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 22px;
            padding: 20px 9% 70px;
        }

        .feature {
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.22);
            border-radius: 24px;
            padding: 25px;
            text-align: center;
            backdrop-filter: blur(12px);
            transition: 0.3s;
        }

        .feature:hover {
            transform: translateY(-10px);
            background: rgba(255,255,255,0.18);
        }

        .feature .icon {
            font-size: 45px;
        }

        .feature h3 {
            margin-bottom: 8px;
            color: #ffe66d;
        }

        @media (max-width: 850px) {
            header {
                padding: 18px 25px;
                flex-direction: column;
                gap: 15px;
            }

            nav a {
                margin: 5px;
            }

            .hero {
                flex-direction: column;
                text-align: center;
                padding-top: 45px;
            }

            .hero h1 {
                font-size: 40px;
            }

            .space-card {
                width: 100%;
                max-width: 330px;
            }
        }
    </style>
</head>

<body>

    <div class="planet"></div>

    <header>
        <div class="logo">🚀 LearnKidz</div>

        <nav>
            <a href="/login">Login</a>
            <a href="{{ route('register') }}">Signup</a>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-text">
            <div class="tag">🌟 Space Learning Adventure</div>

            <h1>Make Learning <span>Fun</span> For Kids</h1>

            <p>
                LearnKidz helps children play quizzes, solve puzzles, and enjoy
                simple learning activities with a fun space science theme.
            </p>

            <div class="buttons">
<a href="{{ url('/kids/puzzles') }}" class="primary">Start Learning</a>            </div>
        </div>

        <div class="space-card">
            <div class="rocket">🧑‍🚀</div>
            <h2>Mission: Smart Kids</h2>
            <p>Explore numbers, puzzles, quizzes, and fun activities like a little astronaut.</p>
        </div>
    </section>

    <section class="features">
        <div class="feature">
            <div class="icon">🧩</div>
            <h3>Puzzles</h3>
            <p>Simple activities to improve thinking skills.</p>
        </div>

        <div class="feature">
            <div class="icon">🔢</div>
            <h3>Counting</h3>
            <p>Fun number practice for young learners.</p>
        </div>

        <div class="feature">
            <div class="icon">🎯</div>
            <h3>Quiz</h3>
            <p>Kids can answer questions and learn quickly.</p>
        </div>

        <div class="feature">
            <div class="icon">👨‍👩‍👧</div>
            <h3>Parent Control</h3>
            <p>Parents can manage questions and track learning.</p>
        </div>
    </section>

</body>
</html>