<!DOCTYPE html>
<html>
<head>
    <title>Add Question</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f6ff;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 750px;
            margin: auto;
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0;
            color: #1f2937;
        }

        .back {
            text-decoration: none;
            color: #4f46e5;
            font-weight: bold;
        }

        label {
            font-weight: bold;
            color: #374151;
            display: block;
            margin-bottom: 6px;
        }

        textarea,
        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 13px;
            border: 1px solid #d1d5db;
            border-radius: 12px;
            font-size: 15px;
            box-sizing: border-box;
            margin-bottom: 18px;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .option-box {
            background: #f9fafb;
            padding: 15px;
            border-radius: 15px;
            border: 1px solid #e5e7eb;
        }

        .correct-box {
            margin-top: 25px;
            background: #eef2ff;
            padding: 20px;
            border-radius: 15px;
        }

        .radio-group {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin-top: 12px;
        }

        .radio-card {
            background: white;
            border: 2px solid #d1d5db;
            border-radius: 12px;
            padding: 12px;
            text-align: center;
            cursor: pointer;
            font-weight: bold;
        }

        .radio-card input {
            margin-right: 5px;
        }

        button {
            width: 100%;
            margin-top: 25px;
            padding: 15px;
            background: #4f46e5;
            color: white;
            border: none;
            border-radius: 14px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #3730a3;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        @media (max-width: 700px) {
            .options,
            .radio-group {
                grid-template-columns: 1fr;
            }

            body {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="top">
        <h1>Add Question</h1>
        <a href="/parent/questions" class="back">← Back</a>
    </div>

    @if ($errors->any())
        <div class="error">
            Please fill all required fields correctly.
        </div>
    @endif

    <form method="POST" action="/parent/questions" enctype="multipart/form-data">
        @csrf

        <label>Question</label>
        <textarea name="question" placeholder="Example: How many apples are in the picture?" required>{{ old('question') }}</textarea>

        <label>Question Image</label>
        <input type="file" name="image" accept="image/*">

        <div class="options">
            <div class="option-box">
                <label>Option A</label>
                <input type="text" name="option_a" value="{{ old('option_a') }}" required>
            </div>

            <div class="option-box">
                <label>Option B</label>
                <input type="text" name="option_b" value="{{ old('option_b') }}" required>
            </div>

            <div class="option-box">
                <label>Option C</label>
                <input type="text" name="option_c" value="{{ old('option_c') }}" required>
            </div>

            <div class="option-box">
                <label>Option D</label>
                <input type="text" name="option_d" value="{{ old('option_d') }}" required>
            </div>
        </div>

        <div class="correct-box">
            <label>Select Correct Answer</label>

            <div class="radio-group">
                <label class="radio-card">
                    <input type="radio" name="correct_answer" value="A" required>
                    Option A
                </label>

                <label class="radio-card">
                    <input type="radio" name="correct_answer" value="B">
                    Option B
                </label>

                <label class="radio-card">
                    <input type="radio" name="correct_answer" value="C">
                    Option C
                </label>

                <label class="radio-card">
                    <input type="radio" name="correct_answer" value="D">
                    Option D
                </label>
            </div>
        </div>

        <button type="submit">Save Question</button>
    </form>

</div>

</body>
</html>