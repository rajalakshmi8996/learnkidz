<!DOCTYPE html>
<html>
<head>
    <title>Parent Dashboard</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #333;
        }

        .header {
            background: linear-gradient(135deg, #6a5cff, #00bcd4);
            color: white;
            padding: 35px 60px;
        }

        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 36px;
        }

        .welcome {
            font-size: 20px;
            margin: 12px 0 5px;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 30px auto;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            text-align: center;
        }

        .card h3 {
            margin: 0;
            color: #777;
            font-size: 16px;
        }

        .card p {
            font-size: 32px;
            font-weight: bold;
            margin: 15px 0 0;
            color: #6a5cff;
        }

        .section {
            background: white;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            background: #6a5cff;
            color: white;
            padding: 12px 18px;
            border-radius: 10px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-weight: bold;
            display: inline-block;
        }

        .btn:hover {
            background: #5146d8;
        }

        .logout-btn {
            background: white;
            color: #6a5cff;
        }

        .logout-btn:hover {
            background: #f0f2ff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            background: #f0f2ff;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #eee;
        }

        .badge {
            background: #e8f7ee;
            color: #1b8a4c;
            padding: 6px 10px;
            border-radius: 20px;
            font-weight: bold;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }
    </style>
</head>

<body>

<div class="header">
    <div class="header-row">
        <div>
            <h1>Parent Dashboard</h1>

            <p class="welcome">
                Welcome, <strong>{{ auth()->user()->name ?? 'Parent' }}</strong>
            </p>

            <p>Track your kid's quiz progress and manage questions</p>
        </div>

        <form method="POST" action="{{ route('logout') }}">
    @csrf

    <button type="submit" style="background:red;color:white;padding:10px 18px;border:none;border-radius:8px;cursor:pointer;">
        Logout
    </button>
</form>
    </div>
</div>

<div class="container">

    <div class="cards">
        <div class="card">
            <h3>Total Attempts</h3>
            <p>{{ $results->count() }}</p>
        </div>

        <div class="card">
            <h3>Latest Score</h3>
            <p>
                @if($results->count() > 0)
                    {{ $results->first()->score }}/{{ $results->first()->total }}
                @else
                    0/0
                @endif
            </p>
        </div>

        <div class="card">
            <h3>Best Score</h3>
            <p>
                @if($results->count() > 0)
                    {{ $results->max('score') }}
                @else
                    0
                @endif
            </p>
        </div>
    </div>

    <div class="section">
        <div class="top-bar">
            <h2>Quiz Results</h2>

            <a href="/parent/questions" class="btn">
                Create / Manage Questions
            </a>
        </div>

        @if($results->count() > 0)
            <table>
                <tr>
                    <th>#</th>
                    <th>Score</th>
                    <th>Total</th>
                    <th>Percentage</th>
                    <th>Date</th>
                </tr>

                @foreach($results as $index => $result)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $result->score }}</td>
                        <td>{{ $result->total }}</td>
                        <td>
                            <span class="badge">
                                {{ $result->total > 0 ? round(($result->score / $result->total) * 100, 2) : 0 }}%
                            </span>
                        </td>
                        <td>{{ $result->created_at->format('d M Y, h:i A') }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            <div class="empty">
                <h3>No quiz results yet</h3>
                <p>Once kids complete a quiz, results will appear here.</p>
            </div>
        @endif
    </div>

</div>

</body>
</html>