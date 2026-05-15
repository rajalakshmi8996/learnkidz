<!DOCTYPE html>
<html>
<head>
    <title>Counting Puzzle</title>
    <style>
        body {
            font-family: Arial;
            background: #fff3d6;
            padding: 30px;
            text-align: center;
        }

        .question {
            background: white;
            padding: 20px;
            margin: 20px auto;
            max-width: 500px;
            border-radius: 18px;
            box-shadow: 0 5px 12px rgba(0,0,0,0.12);
        }

        .items {
            font-size: 40px;
            margin: 15px 0;
            letter-spacing: 8px;
        }

        input {
            padding: 10px;
            font-size: 18px;
            width: 80px;
            text-align: center;
        }

        button, a {
            display: inline-block;
            margin: 20px 10px;
            padding: 12px 22px;
            background: #ff9800;
            color: white;
            text-decoration: none;
            border-radius: 12px;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }

        .back {
            background: #607d8b;
        }
    </style>
</head>
<body>

<h1>Counting Puzzle</h1>
<p>Count the objects and type the correct number.</p>

<form method="POST" action="#">
    @csrf

    @php
        $questions = [
            ['items' => '🍎 🍎 🍎', 'answer' => 3],
            ['items' => '⭐ ⭐ ⭐ ⭐ ⭐', 'answer' => 5],
            ['items' => '🐟 🐟', 'answer' => 2],
            ['items' => '🚗 🚗 🚗 🚗', 'answer' => 4],
            ['items' => '🎈 🎈 🎈 🎈 🎈 🎈', 'answer' => 6],
            ['items' => '🍌 🍌 🍌 🍌 🍌 🍌 🍌', 'answer' => 7],
            ['items' => '🐶 🐶 🐶 🐶 🐶 🐶 🐶 🐶', 'answer' => 8],
            ['items' => '🌸 🌸 🌸 🌸 🌸 🌸 🌸 🌸 🌸', 'answer' => 9],
            ['items' => '⚽', 'answer' => 1],
            ['items' => '🍓 🍓 🍓 🍓 🍓 🍓 🍓 🍓 🍓 🍓', 'answer' => 10],
        ];
    @endphp

    @foreach($questions as $index => $q)
        <div class="question">
            <h2>Question {{ $index + 1 }}</h2>

            <div class="items">
                {{ $q['items'] }}
            </div>

            <label>Your answer:</label><br><br>
            <input type="number" name="answers[{{ $index }}]" min="1" max="10">

            <input type="hidden" name="correct[{{ $index }}]" value="{{ $q['answer'] }}">
        </div>
    @endforeach

    <button type="submit">Submit Answers</button>
</form>

<a href="/kids-puzzles" class="back">Back to Puzzles</a>

</body>
</html>