<script type="text/javascript">
$('.addMeal').on('submit', function(e){
    e.preventDefault();
    // var meal_ = $('.editBtn').val();
    var meal = $('#meal_').val();
    var cal = $('#caloo').val();
    var date = $('#datee').val();
    var time = $('#timee').val();
    
    $.ajax({ 
        type: "POST",
        url: "/addNewMeal",
        data: {
        'calories' : cal,
        'meal' : meal,
        // 'meal_e' : meal_,
        'date' : date,
        'time' : time,
        '_token': '{{ csrf_token() }}',
    },
        //  headers: {'XSRF-TOKEN': $('meta[name="_token"]').attr('content')},
        success: function(response){
            console.log(response);
            $('#response').html("<div>"+meal+" Added Successfully!</div>");
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
</script>