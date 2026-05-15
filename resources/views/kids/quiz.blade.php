<!DOCTYPE html>
<html>
<head>
    <title>Kids Quiz</title>

    <style>
        body {
            font-family: Arial;
            background: #fff3d6;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #ff7a00;
        }

        .card {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        }

        img {
            max-width: 200px;
            margin-top: 10px;
            border-radius: 12px;
            display: block;
        }

        .option {
            display: block;
            background: #e0f7fa;
            padding: 12px;
            margin: 8px 0;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
        }

        .option input {
            margin-right: 10px;
        }

        .submit-btn {
            background: #F5C542;
            border: none;
            padding: 14px 30px;
            border-radius: 25px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            display: block;
            margin: 30px auto;
        }
    </style>
</head>

<body>

<h1>Kids Quiz</h1>

<form method="POST" action="/kids-quiz/submit">
    @csrf

    @foreach($questions as $index => $q)
        <div class="card">

            <h3>{{ $index + 1 }}. {{ $q->question }}</h3>

            @if($q->image)
                <img src="{{ asset('storage/' . $q->image) }}"
                     alt="Question Image">
            @endif

            <label class="option">
                <input type="radio" name="answers[{{ $q->id }}]" value="A" required>
                A. {{ $q->option_a }}
            </label>

            <label class="option">
                <input type="radio" name="answers[{{ $q->id }}]" value="B">
                B. {{ $q->option_b }}
            </label>

            @if($q->option_c)
                <label class="option">
                    <input type="radio" name="answers[{{ $q->id }}]" value="C">
                    C. {{ $q->option_c }}
                </label>
            @endif

            @if($q->option_d)
                <label class="option">
                    <input type="radio" name="answers[{{ $q->id }}]" value="D">
                    D. {{ $q->option_d }}
                </label>
            @endif

        </div>
    @endforeach

    <button type="submit" class="submit-btn">Submit Quiz</button>
</form>

</body>
</html>