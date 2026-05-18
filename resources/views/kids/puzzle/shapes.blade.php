<!DOCTYPE html>
<html>
<head>
    <title>Shapes Puzzle</title>
</head>

<body style="font-family: Arial; background:#e3f2fd; text-align:center; padding:30px;">

<h1>Shapes Puzzle</h1>
<p>Choose the correct shape name.</p>

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

<form method="POST" action="{{ url('/kids/shapes/check') }}">
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
        <div style="
            background:white;
            padding:20px;
            margin:15px auto;
            max-width:400px;
            border-radius:15px;
            box-shadow:0 5px 12px rgba(0,0,0,0.12);
        ">
            <h2>Question {{ $index + 1 }}</h2>

            <div style="font-size:60px;">
                {{ $q['shape'] }}
            </div>

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

    <button type="submit" style="
        padding:12px 22px;
        background:#2196f3;
        color:white;
        border:none;
        border-radius:12px;
        font-size:18px;
        cursor:pointer;
    ">
        Submit Answers
    </button>
</form>

<br>

<a href="{{ url('/kids/puzzles') }}" style="
    display:inline-block;
    margin-top:20px;
    padding:12px 22px;
    background:#607d8b;
    color:white;
    text-decoration:none;
    border-radius:12px;
">
    Back to Puzzles
</a>

</body>
</html>