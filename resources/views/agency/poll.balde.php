<!-- showpoll.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poll Results</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Poll Results</h2>
        @foreach($voteCounts as $voteCount)
            <div class="mb-3">
                <p>{{ $voteCount->option_selected }}</p>
                <div class="progress">
                    <div class="progress-bar @if(($voteCount->total / $totalVotes) * 100 <= 20) bg-danger @elseif(($voteCount->total / $totalVotes) * 100 <= 30) bg-primary @else bg-success @endif" role="progressbar" style="width: {{ ($voteCount->total / $totalVotes) * 100 }}%" aria-valuenow="{{ ($voteCount->total / $totalVotes) * 100 }}" aria-valuemin="0" aria-valuemax="100">{{ round(($voteCount->total / $totalVotes) * 100, 2) }}%</div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
