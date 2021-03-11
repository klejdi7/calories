{{-- INFO MODAL --}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Meal Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="editInfo">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
        <div class="input-group bg-light" style="border-radius: 12px">
        <input type="text" class="input-group-text" id="meal" >
          <input type="text" class="form-control "  id="cal" >
            <span class="input-group-text bg-light">kcal</span>
          </div>
    
          <input type="date" class="form-control"  id="date">
          <input type="time" class="form-control mb-2"  id="time">
          <button type="submit" value="" class="editBtn btn btn-primary mb-3"> Edit </button>
          <button  value="" class="deleteBtn btn btn-danger mb-3"> Delete </button>

        </form>
  </div>
  
      </div>
    </div>
  </div>
{{-- INFO MODAL END --}}



    </script>