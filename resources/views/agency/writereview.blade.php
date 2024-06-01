
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .rating-container {
            display: flex;
            align-items: center;
        }

        .rating-text {
            margin-right: 10px;
            font-size: 20px;
            font-family: 'Arial', sans-serif; /* Change the font family to your desired one */
            font-weight: bold; /* Make the text bold */
        }

        .rating {
            font-size: 0; /* Remove white space between spans */
        }

        .rating-star {
            display: inline-block;
            width: 20px; /* Adjust the size of the bubbles */
            height: 20px; /* Adjust the size of the bubbles */
            margin-right: 5px; /* Adjust the spacing between bubbles */
            border: 2px solid #ccc; /* Border color for empty bubbles */
            border-radius: 50%; /* Make the bubbles round */
            cursor: pointer;
        }

        .filled {
            background-color: #28a745; /* Fill color for bubbles */
            border-color: #28a745; /* Border color for filled bubbles */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row mt-5 p-5">
            <div class="col-md-4">
                <h1 class="mb-5">Tell us, how was your visit ?</h1>
                <img class="mb-2" src="{{ asset('/Eventimages/' . $event_data->eimage) }}" alt="" width="250px" height="150px">
                <h4>{{ $event_data->tittle}}</h4>
            </div>
            <div class="col-md-8">
                <form action="{{route('header.storereview')}}" method="post">
                    @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <p> {{ $error }} </p>
                            @endforeach
                        </ul>
                    </div>
                @endif

                   
                    <h5 class="mb-3">How would you rate your experience ?</h5>
                    <input type="hidden" id="selected-rating" name="selected-rating">
                    <div class="rating-container mt-2">
                        <div class="rating-text"></div>
                        <div class="rating">
                            <span class="rating-star" data-value="1"></span>
                            <span class="rating-star" data-value="2"></span>
                            <span class="rating-star" data-value="3"></span>
                            <span class="rating-star" data-value="4"></span>
                            <span class="rating-star" data-value="5"></span>
                        </div>
                    </div>
                    <h5 class="mt-4">Who did you go with ?</h5>
                    <div class="btn-group">
                        <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="selected-category-btn">
                            Select Category
                        </button>
                        <div class="dropdown-menu">
                            <input type="hidden" id="selected-category" name="selected-category">
                            <a class="dropdown-item select-category" href="#" data-value="Family">Family</a>
                            <a class="dropdown-item select-category" href="#" data-value="Couples">Couples</a>
                            <a class="dropdown-item select-category" href="#" data-value="Business">Business</a>
                            <a class="dropdown-item select-category" href="#" data-value="Friends">Friends</a>
                            <a class="dropdown-item select-category" href="#" data-value="Solo">Solo</a>
                        </div>
                    </div>
                    <div class="mb-2 mt-5">
                        <h5>Write your review</h5>
                    </div>
                    <div>
                        <textarea name="review" id="review" cols="80" rows="5" placeholder="Here write a review" class="form-control rounded"></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark form-control rounded-pill w-25 mt-5 ml-5">Submit</button>
                <!-- event hidden id  -->
                <input type="hidden" name="event_id" value={{ $event_data->id }}>
                <!-- user hidden id  -->
                <input type="hidden" name="user_id" value={{ $user_id }}>
                
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ratingStars = document.querySelectorAll('.rating-star');
            const ratingText = document.querySelector('.rating-text');
            const selectedRatingInput = document.getElementById('selected-rating');
            const selectedCategoryInput = document.getElementById('selected-category');
            const selectedCategoryBtn = document.getElementById('selected-category-btn');
            const ratingLabels = ['Terrible', 'Poor', 'Average', 'Good', 'Excellent'];

            ratingStars.forEach(star => {
                star.addEventListener('click', function() {
                    const value = parseInt(this.getAttribute('data-value'));
                    ratingStars.forEach((star, index) => {
                        star.classList.toggle('filled', index < value);
                    });
                    ratingText.textContent = ratingLabels[value - 1];
                    selectedRatingInput.value = value;
                });
            });

            // Add event listener to each category item in dropdown menu
            document.querySelectorAll('.select-category').forEach(category => {
                category.addEventListener('click', function() {
                    // Set the value of the hidden input field with the selected category value
                    selectedCategoryInput.value = this.getAttribute('data-value');
                    // Update the text of the dropdown button to the selected category
                    selectedCategoryBtn.textContent = this.textContent;
                });
            });
        });
    </script>
</body>
</html>
