<!DOCTYPE html>
<html>
<head>
    <title>Find the Different One</title>

    <style>
        body {
            font-family: Arial;
            background: #fff8e1;
            text-align: center;
            padding: 30px;
        }

        h1 {
            color: #333;
        }

        .card {
            background: white;
            padding: 20px;
            margin: 20px auto;
            max-width: 550px;
            border-radius: 18px;
            box-shadow: 0 5px 12px rgba(0,0,0,0.1);
        }

        .items {
            font-size: 50px;
            margin: 20px 0;
        }

        .option {
            display: inline-block;
            margin: 10px;
            padding: 15px;
            background: #f1f1f1;
            border-radius: 15px;
            cursor: pointer;
            font-size: 40px;
            transition: 0.2s;
        }

        .option:hover {
            background: #ffe082;
        }

        input[type="radio"] {
            display: none;
        }

        input[type="radio"]:checked + span {
            background: #ff9800;
            color: white;
            padding: 10px;
            border-radius: 10px;
        }

        button, a {
            display: inline-block;
            margin: 20px 10px;
            padding: 12px 22px;
            background: #6a5cff;
            color: white;
            text-decoration: none;
            border-radius: 12px;
            border: none;
            font-size: 18px;
            cursor: pointer;
        }

        .back-btn {
            background: #607d8b;
        }
    </style>
</head>

<body>

<h1>🔍 Find the Different One</h1>

<p>Select the different item in each question.</p>

@if(session('result'))
    <div style="
        background: #d4edda;
        color: #155724;
        padding: 15px;
        margin: 20px auto;
        max-width: 400px;
        border-radius: 12px;
        font-size: 22px;
        font-weight: bold;
    ">
        {{ session('result') }}
    </div>
@endif

<form method="POST" action="{{ url('/kids/find-difference/check') }}">
    @csrf

    @php
        $questions = [

            [
                'items' => ['🍎','🍎','🍎','🍌'],
                'options' => ['🍎','🍌','🍊'],
                'answer' => '🍌'
            ],

            [
                'items' => ['🐶','🐶','🐱','🐶'],
                'options' => ['🐶','🐱','🐰'],
                'answer' => '🐱'
            ],

            [
                'items' => ['🚗','🚗','🚌','🚗'],
                'options' => ['🚗','🚌','🚲'],
                'answer' => '🚌'
            ],

            [
                'items' => ['⭐','⭐','🌙','⭐'],
                'options' => ['⭐','🌙','☀️'],
                'answer' => '🌙'
            ],

            [
                'items' => ['⚽','⚽','🏀','⚽'],
                'options' => ['⚽','🏀','🎾'],
                'answer' => '🏀'
            ],

        ];
    @endphp

    @foreach($questions as $index => $q)

        <div class="card">

            <h2>Question {{ $index + 1 }}</h2>

            <div class="items">
                @foreach($q['items'] as $item)
                    {{ $item }}
                @endforeach
            </div>

            <p>Select the different one:</p>

            @foreach($q['options'] as $option)

                <label class="option">

                    <input
                        type="radio"
                        name="answers[{{ $index }}]"
                        value="{{ $option }}"
                    >

                    <span>{{ $option }}</span>

                </label>

            @endforeach

        </div>

    @endforeach

    <button type="submit">
        Submit Answers
    </button>

</form>

<a href="{{ url('/kids/puzzles') }}" class="back-btn">
    ⬅ Back to Puzzles
</a>

</body>
</html>