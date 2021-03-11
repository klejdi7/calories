{{-- INFO MODAL --}}
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Meal Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
  
          <div class="dataInfo rmb-3">
          </div>

          <div class="input-group mb-2 bg-{{$bgcolor}}" style="border-radius: 12px">
            <span class="input-group-text bg-{{$bgcolor}}">Total kcal</span>
          <input type="text" class="form-control bg-light total-nr"  style="color:{{$cssbgcolor}}" value="" readonly aria-label="kcal">
            <span class="input-group-text bg-{{$bgcolor}}">kcal</span>
          </div>

                  <div class="input-group mb-2">
                    <span class="input-group-text bg-light">Calories Recommendation</span>
                  <input type="text" class="form-control" value="{{ $calories }}" readonly aria-label="kcal">
                    <span class="input-group-text">kcal</span>
                  </div>
  
                <div class="mb-3 alert alert-{{ $bgcolor }}"   role="alert" > {{ $msg }} </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
  </div>
  
      </div>
    </div>
  </div>
{{-- INFO MODAL END --}}


{{-- ADD MODAL --}}
<div class="modal fade" id="addMeal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Meal Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="newMeal">
        <div class="input-group mb-2" style="border-radius: 12px">
          <span class="input-group-text">Select Date</span>
        <input type="date" class="form-control" id="date_select" >
        </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Create Meal <i class="bi bi-arrow-right"></i></button>
      </div>
    </form>
</div>

    </div>
  </div>
</div>
{{-- INFO MODAL END --}}


    </script>