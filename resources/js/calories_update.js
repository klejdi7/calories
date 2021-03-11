$(document).ready(function()
{
        $('#kcal_update').on('submit', function(e){
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "/calories_update",
                data: $("#kcal_update").serialize,
                success: function(response){
                    $("#exampleModal").modal('hide')
                    alert("done");

                       $('#response').html("<div>Calories Limit Updated Successfully!</div>")
                    $('.toast').toast('show');
                },
                error: function(error){
                    console.log(error)
                    $('#response').html("<div>Calories Limit Updatee failed!</div>");
                    alert("error");

                }
            });
        });
});