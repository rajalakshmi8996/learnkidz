<!DOCTYPE html>
<html>
<head>
    <title>Parent Questions</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7ff;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        h1 {
            margin: 0;
            color: #222;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            color: white;
            border: none;
            cursor: pointer;
            display: inline-block;
        }

        .add-btn {
            background: #4f46e5;
        }

        .add-btn:hover {
            background: #3730a3;
        }

        .quiz-btn {
            background: #22c55e;
        }

        .quiz-btn:hover {
            background: #15803d;
        }

        .logout-btn {
            background: #ef4444;
        }

        .logout-btn:hover {
            background: #dc2626;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 12px;
        }

        th {
            background: #4f46e5;
            color: white;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background: #f3f4ff;
        }

        .delete {
            background: #ef4444;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .delete:hover {
            background: #dc2626;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="top">

        <h1>Parent Questions</h1>

        <div class="btn-group">

            <a class="btn add-btn" href="/parent/questions/create">
                + Add Question
            </a>

            <a class="btn quiz-btn" href="/kids-quiz">
                ▶ Start Quiz
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="btn logout-btn" type="submit">
                    Logout
                </button>
            </form>

        </div>

    </div>

    <table>

        <tr>
            <th>#</th>
            <th>Question</th>
            <th>Correct Answer</th>
            <th>Actions</th>
        </tr>

        @forelse($questions as $index => $q)

            <tr>

                <td>{{ $index + 1 }}</td>

                <td>{{ $q->question }}</td>

                <td>{{ $q->correct_answer }}</td>

                <td>
                    <div class="actions">

                        <form method="POST" action="/parent/questions/{{ $q->id }}">
                            @csrf
                            @method('DELETE')

                            <button class="delete" type="submit">
                                Delete
                            </button>
                        </form>

                    </div>
                </td>

            </tr>

        @empty

            <tr>
                <td colspan="4" class="empty">
                    No questions added yet.
                </td>
            </tr>

        @endforelse

    </table>

</div>

</body>
</html>