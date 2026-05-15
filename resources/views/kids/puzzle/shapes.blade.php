<!DOCTYPE html>
<html>
<head>
    <title>Shapes Puzzle</title>
</head>
<body style="font-family: Arial; background:#e3f2fd; text-align:center; padding:30px;">

<h1>Shapes Puzzle</h1>

<form method="POST" action="/kids-puzzles/shapes">
    @csrf

    @php
        $questions = [
            ['shape' => '🔴', 'options' => ['circle', 'square', 'triangle'], 'answer' => 'circle'],
            ['shape' => '🟦', 'options' => ['circle', 'square', 'star'], 'answer' => 'square'],
            ['shape' => '🔺', 'options' => ['triangle', 'heart', 'diamond'], 'answer' => 'triangle'],
            ['shape' => '⭐', 'options' => ['star', 'circle', 'square'], 'answer' => 'star'],
            ['shape' => '❤️', 'options' => ['heart', 'triangle', 'diamond'], 'answer' => 'heart'],
            ['shape' => '🟩', 'options' => ['square', 'circle', 'star'], 'answer' => 'square'],
            ['shape' => '🟡', 'options' => ['circle', 'triangle', 'heart'], 'answer' => 'circle'],
            ['shape' => '🔷', 'options' => ['diamond', 'square', 'circle'], 'answer' => 'diamond'],
            ['shape' => '⬛', 'options' => ['square', 'star', 'triangle'], 'answer' => 'square'],
            ['shape' => '🔶', 'options' => ['diamond', 'heart', 'circle'], 'answer' => 'diamond'],
        ];
    @endphp

    @foreach($questions as $index => $q)
        <div style="background:white; padding:20px; margin:15px auto; max-width:400px; border-radius:15px;">
            <h2>Question {{ $index + 1 }}</h2>

            <div style="font-size:60px;">{{ $q['shape'] }}</div>

            <p>What shape is this?</p>

            @foreach($q['options'] as $option)
                <label style="display:block; margin:10px; font-size:20px;">
                    <input type="radio" name="answers[{{ $index }}]" value="{{ $option }}">
                    {{ ucfirst($option) }}
                </label>
            @endforeach

            <input type="hidden" name="correct[{{ $index }}]" value="{{ $q['answer'] }}">
        </div>
    @endforeach

    <button type="submit">Submit</button>
</form>

<br>
<a href="/kids-puzzles">Back to Puzzles</a>

</body>
</html>