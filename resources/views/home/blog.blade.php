<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
   
</head>
<body>
   @csrf
    <div id="s-id">
        @include('home.blogchild')
    </div>

   
    <script >
        $(document).ready(function () {
    // Intercept pagination links
    $(document).on('click', '.page-link', function (event) {
        event.preventDefault();

        var page = $(this).attr('href').split('page=')[1];
      
    //   console.log(page);
        fetchEvents(page);
    });

    // Function to fetch events via AJAX
    function fetchEvents(page) {
        console.log('AJAX request sent'); 
console.log(page);
        var _token = $('input[name=_token]').val();
        console.log(_token);

        $.ajax({
            url: "{{ route('pagination.fetch') }}",
            type: 'POST',
            data: { _token: _token, page: page },
            success: function (data) {

                $('#s-id').html(data);
            },
            error: function(data){
        console.log(data);
    }
            

            
        });
    }
});

    </script>
</body>
</html>
