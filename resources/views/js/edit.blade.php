<script type="text/javascript">

           $('.mdopen').on('click', function(e){
            var meal = $(this).val();
        $.ajax({  
        type: "GET",
        url: "/getMeal",     
        data: {'meal' : meal},
        success: function(response){                    
        console.log(response);
        $('#meal').val(response[0].meal);
        $('#cal').val(response[0].calories);
        $('#date').val(response[0].date);
        $('#time').val(response[0].time);
        $('.editBtn').val(response[0].meal);
        $('.deleteBtn').val(response[0].meal);
    }
}); 
});

   $(document).ready(function()
    {
        $('.deleteBtn').on('click', function(e){
            var meal = $(this).val();
        $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "/deleteMeal",     
        data: {'meal' : meal},
        success: function(response){                    
        // $("#responsecontainer").html(response); 
        console.log(response);
        }
    }); 
});



                        $('.editInfo').on('submit', function(e){
                e.preventDefault();
                var meal_ = $('.editBtn').val();
                var meal = $('#meal').val();
                var cal = $('#cal').val();
                var date = $('#date').val();
                var time = $('#time').val();
                $.ajax({ 
                    type: "PUT",
                    url: "/editMeal",
                    data: {
                    'calories' : cal,
                    'meal' : meal,
                    'meal_e' : meal_,
                    'date' : date,
                    'time' : time,
                    '_token': '{{ csrf_token() }}',
                },
                    //  headers: {'XSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                    success: function(response){
                        console.log(response);
                        $('#response').html("<div>"+meal+" Updated Successfully!</div>");
                        $('.toast').toast('show');
                        location.reload();
                    },
                    error: function(error){
                        console.log(error);
                        $('#response').html("<div>Update failed!</div>");
                        $('.toast').toast('show');
                        
                    }
                });
            });


            $('#editInfo').on('submit', function(e){
                e.preventDefault();
                var meal_ = $('#subbtn').val();
                var meal = $('#meal').val();
                var cal = $('#cal').val();
                var date = $('#date').val();
                var time = $('#time').val();
                $.ajax({ 
                    type: "PUT",
                    url: "/editMeal",
                    data: {
                    'calories' : cal,
                    'meal' : meal,
                    'meal_exist' : meal_,
                    'date' : date,
                    'time' : time,
                    '_token': '{{ csrf_token() }}',
                },
                    //  headers: {'XSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                    success: function(response){
                        console.log(response);
                        $('#response').html("<div>"+meal+" Updated Successfully!</div>");
                        $('.toast').toast('show');
                        // location.reload();
                    },
                    error: function(error){
                        console.log(error);
                        $('#response').html("<div>Update failed!</div>");
                        $('.toast').toast('show');
                        
                    }
                });
            });
    });
    </script>
    