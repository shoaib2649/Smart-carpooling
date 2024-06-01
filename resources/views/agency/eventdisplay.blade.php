!
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        .bgs {

            margin-top: 90px;

            padding: 0px;
        }

        #thead th {
            color: white;
            background: black;
            font-size: bolder;
        }
    </style>
</head>

<body>





    <div class="container-fluid bgs border-radius-4">
        @if (session('message'))
            <div class="alert alert-success  w-100 text-center  " id="flash-message">
                {{ session('message') }}
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Automatically hide the flash message after 5 seconds
                    var flashMessage = document.getElementById('flash-message');

                    if (flashMessage) {
                        setTimeout(function() {
                            flashMessage.classList.add('d-none');
                        }, 2500);
                    }
                });
            </script>
        @endif
        <table class="table table-bordered ">


            <thead class="text-center border-info bg-black text-white" id="thead">
                <tr>

                    <th>ID</th>
                    <th>Tittle</th>
                    <th>From</th>
                    <th>To</th>
                    {{-- <th>Arrival Time</th>
                    <th>Departure Time</th> --}}
                    <th>Images</th>
                    <th colspan="3">Action</th>
                </tr>

            </thead>
            <tbody class="text-center border-secondary">
                @foreach ($Event as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->tittle }}</td>
                        <td>{{ $event->fromcity }}</td>
                        <td>{{ $event->tocity }}</td>
                        {{-- <td>{{ $event->atime }}</td>
                        <td>{{ $event->dtime }}</td> --}}
                        <td><img src="{{ asset('/Eventimages/' . $event->eimage) }}" alt="Something wrong"
                                width="100px" height="100px"></td>
                        <td><a href="{{ url('agencyeditevent/' . $event->id) }}" class="btn btn-primary">Edit</a></td>
                        <td><a href="{{ url('eventreject/' . $event->id) }}" class="btn btn-danger">Delete</a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
