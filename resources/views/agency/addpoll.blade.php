<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poll System</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .poll-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="poll-container">
        <h2 class="text-center">Create a Poll</h2>
        <form action="{{url('storepoll')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="question">Question:</label>
                <input type="text" class="form-control" id="question" name="question" required>
            </div>
            <div class="form-group">
                <label for="option1">Option 1:</label>
                <input type="text" class="form-control" id="option1" name="options_a" required>
            </div>
            <div class="form-group">
                <label for="option2">Option 2:</label>
                <input type="text" class="form-control" id="option2" name="options_b" required>
            </div>
            <div class="form-group">
                <label for="option3">Option 3:</label>
                <input type="text" class="form-control" id="option3" name="options_c" required>
            </div>
            <div class="form-group">
                <label for="option4">Option 4:</label>
                <input type="text" class="form-control" id="option4" name="options_d" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Create Poll</button>
        </form>
    </div>

    
</body>
</html>
