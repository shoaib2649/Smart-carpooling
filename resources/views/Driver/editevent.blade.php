


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            border:2px solid blue;
            margin-top: 23px;
        }

        .rounded-pill {
            border-radius: 50px;
        }
        input[type=text], input[type=time], input[type=file], textarea {
    outline: 1px solid #46fc7c;
}

    </style>
</head>
<body>
    
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container ">
                    <h2 class="text-center mb-4">Edit Event</h2>
                    <form action="{{ url('/update/' . $edits->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="text-black">Tittle</label>
                            <input type="text" name="tittle" class="form-control rounded-pill" id="name" placeholder="Enter the title" value="{{$edits->tittle}}">
                        </div>
                       
                        <div class="form-group mb-3">
                            <label>From City</label>
                            <input type="text" name="fcity" class="form-control rounded-pill" placeholder="Enter the from city" value="{{$edits->fromcity}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>To City</label>
                            <input type="text" name="tcity" class="form-control rounded-pill" placeholder="Enter the to city" value="{{$edits->tocity}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Details</label>
                            <textarea name="detail" class="form-control rounded-pill" placeholder="Enter details">{{$edits->detail}}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Departure Time</label>
                            <input type="time" name="dtime" class="form-control rounded-pill" placeholder="Enter departure time" value="{{$edits->dtime}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Arrival Time</label>
                            <input type="time" name="atime" class="form-control rounded-pill" placeholder="Enter arrival time" value="{{$edits->atime}}">
                        </div>

                        <div class="form-group mb-3">
            <label for="confirmPassword">Old Images</label>
          <img src="{{ asset('/Eventimages/' . $edits->eimage) }}" alt="Something wrong" width="60px" height="60px">
          </div>
                        <div class="form-group mb-3">
                            <label>New Images Upload</label>
                            <input type="file" name="eimage" class="form-control">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success rounded-pill">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



