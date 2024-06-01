<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

</head>

<body>

    <div class="container mt-5 mb-5 p-5 w-75">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- <h2 class="text-center mb-4">Registration Form</h2> -->
                <form action="{{ url('/agencyupdate/' . $edits->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--  @method('PUT') -->
                    <div class="form-group mb-3">
                        <label for="name">Tittle</label>
                        <input type="text" name="tittle" class="form-control " id="name"
                            placeholder="Enter your name" value="{{ $edits->tittle }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Details</label>
                        <textarea type="text" name="detail" class="form-control" placeholder="Enter your Detail">{{ $edits->detail }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">From City</label>
                        <input type="text" name="fcity"class="form-control" id="email"
                            placeholder="Enter your email"value="{{ $edits->fromcity }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">To City</label>
                        <input type="text" name="tcity"class="form-control" id="email"
                            placeholder="Enter your email"value="{{ $edits->tocity }}">
                    </div>



                    <div class="form-group mb-3">
                        <label for="confirmPassword">Departure Time</label>
                        <input type="time" name="dtime" class="form-control"
                            placeholder="Enter the departure time"value="{{ $edits->dtime }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="confirmPassword">Arrival Time</label>
                        <input type="time" name="atime" class="form-control"
                            placeholder="Enter the departure time"value="{{ $edits->atime }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="confirmPassword">Old Images</label>
                        <img src="{{ asset('/Eventimages/' . $edits->eimage) }}" alt="Something wrong" width="60px"
                            height="60px">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">New Images Upload</label>
                        <input type="file" name="eimage" class="form-control">
                    </div>


                    <button type="submit" class="btn btn-primary btn-block w-50">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
