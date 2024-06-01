<!-- showpoll.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poll</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <h2>Poll Question</h2>
                <form action="{{ url('submit-poll') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="question">Question:</label>
                        <p>{{ $questions->question }}</p>
                    </div>
                    <div>
                        <input type="hidden" name="id" value="{{ $questions->id }}">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" id="option_a" value="{{ $questions->option_a }}" required>
                        <label class="form-check-label" for="option_a">{{ $questions->option_a }}</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" id="option_b" value="{{ $questions->option_b }}" required>
                        <label class="form-check-label" for="option_b">{{ $questions->option_b }}</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" id="option_c" value="{{ $questions->option_c }}" required>
                        <label class="form-check-label" for="option_c">{{ $questions->option_c }}</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" id="option_d" value="{{ $questions->option_d }}" required>
                        <label class="form-check-label" for="option_d">{{ $questions->option_d }}</label>
                    </div>
                    <!-- <div class="form-check">
                        <input class="form-check-input" type="text" name="email={{session()->has('id')}}" id="email" >
                        <label class="form-check-label" for="option_d">{{ $questions->option_d }}</label>
                    </div> -->
                    <button type="submit" class="btn btn-primary mt-5">Submit</button>
                </form>
            </div>
            <div class="col-md-6 mt-5 mt-md-0">
                <h2>Poll Results</h2>
                @foreach($voteCounts as $voteCount)
                    <div class="mb-3">
                        <p>{{ $voteCount->option_selected }}</p>
                        <div class="progress">
                            @php
    $percentage = ($totalVotes != 0) ? ($voteCount->total / $totalVotes) * 100 : 0;
    $colorClass = ($percentage <= 20) ? 'bg-danger' : (($percentage <= 30) ? 'bg-primary' : 'bg-success');
                            @endphp
                            <div class="progress-bar {{ $colorClass }}" role="progressbar" style="width: {{ $percentage }}%" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">{{ round($percentage, 2) }}%</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
