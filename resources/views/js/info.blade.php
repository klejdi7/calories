<script type="text/javascript">

$("#infoModal").on("hide.bs.modal", function(){
    $('.dataInfo').empty();
});
  $(".editbtn").click(function() {     
    //   e.preventDefault();

    var date = $(this).val();

$.ajax({   
type: "GET",
url: "/meal_one",     
data: {'date' : date},
success: function(response){                    
$('.total-nr').val(response.total);
var r = response.count;
$.each( response, function( key, value ) {
  for (i = 0; i <= r; i++) {
var calories = value[i].calories+"kcal";
var time = value[i].time;
var meal = value[i].meal;
$( ".dataInfo" ).append( "<div class='input-group mb-3' ></div><span class='input-group-text bg-info'>"+time+"</span><input type='text' class='call form-control bg-light' style='color:#000' value="+calories+" readonly aria-label='kcal'><span class='input-group-text bg-dark' style='color:#fff' >"+meal+"</span></div>" );           
  }
});

         } 
    });
});

$(document).ready(function()
    {
      $('#addMeal').on('submit', function(e){
                e.preventDefault();
                var date = $('#date_select').val();
                $('#addMeal').hide();
                    $('.modal-backdrop').remove();
                        $('#response').html("<div class='mb-2'> Meal Created Successfully! </div><a href='meal_edit?date="+date+"&mode=creation' class='btn btn-primary'> Go to Meal Creation </a>");
                        $('.toast').toast('show');             
            });


        $('.delD').on('click', function(e){
            var date = $(this).val();
        $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "/deleteDateMeal",     
        data: {'date' : date},
        success: function(response){                    
        // $("#responsecontainer").html(response); 
        console.log(response);
        location.reload();
    }
}); 
});
});

</script>
