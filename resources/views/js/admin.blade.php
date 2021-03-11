<div class="modal fade" id="caloriesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update KCAL Limit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="kcal_update">
                  <div class="input-group mb-3">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="text" id="kcal" name="kcal_limit" class="form-control" placeholder="{{ $cal[0]->calories }}" aria-describedby="basic-addon2" >
                    <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon2">kcal</span>
                    </div>
                  </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" value="Save Changes" class="btn btn-primary">
        </div>
    </form>
</div>

      </div>
    </div>
  </div>
<script type="text/javascript">
$(document).ready(function()
{
        $('#kcal_update').on('submit', function(e){
            e.preventDefault();
            var cal = $('#kcal').val();

            $.ajax({ 
                type: "PUT",
                url: "/addkcal",
                data: {'kcal' : cal,
                '_token': '{{ csrf_token() }}',
            },
                //  headers: {'XSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                success: function(response){
                    console.log(response);
                    $('#caloriesModal').hide();
                    $('.modal-backdrop').remove();
                    $('#response').html("<div>Calories Limit Updated Successfully!</div>");
                    $('.toast').toast('show');
                },
                error: function(error){
                    console.log(error);
                    $('#caloriesModal').hide();
                    $('.modal-backdrop').remove();
                    $('#response').html("<div>Calories Limit Update failed!</div>");
                    $('.toast').toast('show');
                    
                }
            });
        });
});
</script>
