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

        .card {
            background: white;
            padding: 20px;
            margin: 15px auto;
            max-width: 500px;
            border-radius: 15px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        }

        .items {
            font-size: 45px;
            margin-bottom: 10px;
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

        button {
            padding: 12px 25px;
            background: #ff9800;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            cursor: pointer;
        }

        a {
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>

<body>

<h1>Find the Different One</h1>

<form method="POST" action="/kids-puzzles/find-difference">
    @csrf

    @php
        $questions = [
            [
                'items' => ['🍎','🍎','🍎','🍌'],
                'options' => [
                    ['picture' => '🍎', 'value' => 'apple'],
                    ['picture' => '🍌', 'value' => 'banana'],
                    ['picture' => '🍊', 'value' => 'orange'],
                ],
                'answer' => 'banana'
            ],
            [
                'items' => ['🐶','🐶','🐱','🐶'],
                'options' => [
                    ['picture' => '🐶', 'value' => 'dog'],
                    ['picture' => '🐱', 'value' => 'cat'],
                    ['picture' => '🐰', 'value' => 'rabbit'],
                ],
                'answer' => 'cat'
            ],
            [
                'items' => ['🚗','🚗','🚌','🚗'],
                'options' => [
                    ['picture' => '🚗', 'value' => 'car'],
                    ['picture' => '🚌', 'value' => 'bus'],
                    ['picture' => '🚲', 'value' => 'bike'],
                ],
                'answer' => 'bus'
            ],
            [
                'items' => ['⭐','⭐','🌙','⭐'],
                'options' => [
                    ['picture' => '⭐', 'value' => 'star'],
                    ['picture' => '🌙', 'value' => 'moon'],
                    ['picture' => '☀️', 'value' => 'sun'],
                ],
                'answer' => 'moon'
            ],
            [
                'items' => ['⚽','⚽','🏀','⚽'],
                'options' => [
                    ['picture' => '⚽', 'value' => 'football'],
                    ['picture' => '🏀', 'value' => 'basketball'],
                    ['picture' => '🎾', 'value' => 'tennis'],
                ],
                'answer' => 'basketball'
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
<input type="radio" name="answers[{{ $index }}]" value="{{ $option['value'] }}">                    <span>{{ $option['picture'] }}</span>
                </label>
            @endforeach

            <input type="hidden" name="correct[{{ $index }}]" value="{{ $q['answer'] }}">
        </div>
    @endforeach

    <button type="submit">Submit</button>
</form>

<a href="/kids-puzzles">Back to Puzzles</a>

</body>
</html>