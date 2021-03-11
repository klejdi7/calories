@extends('layouts.app')
<?php
$cal = DB::table('calories')
->get();
$calories = $cal[0]->calories;
?>

@section('home-meals')

@can('edit_meal')
<?php
$meals = DB::table('meals')
->where('user_id', '=', Auth::user()->id)
->select('date')
->orderBy('date')
->take(1)
->distinct()
->get();
$x = 1;

$total_kcal = DB::table('meals')
            ->where('user_id', '=', Auth::user()->id)
            ->where('date', '=', $meals[0]->date)
            ->sum('calories');
                              if($total_kcal <= $calories){
                                $bgcolor = "success";
                                $msg = "Good Form!";
                              }
                              else{
                                $bgcolor = "danger";
                                $msg = "Calories recommendation exceeded!";
                              }
?>

<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Check Calories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="input-group mb-3">
          <span class="input-group-text">{{  date('d-m-Y', strtotime($meals[0]->date))  }}</span>
        <input type="text" class="form-control bg-{{ $bgcolor }}" style="color:#fff" value="{{ $total_kcal }}" readonly aria-label="kcal">
          <span class="input-group-text">kcal</span>
        </div>

                <div class="input-group mb-2">
                  <span class="input-group-text">Calories Recommendation</span>
                <input type="text" class="form-control bg-light" value="{{ $calories }}" readonly aria-label="kcal">
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

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
                        <div class="card-header"> Latest Meals </div>

                        <div class="card-body">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Calories</th>
                                <th scope="col">Options</th>
                                {{-- <th scope="col">Time</th> --}}
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($meals as $meal)
                              <tr>
                              <th scope="row">{{$x++}}</th>
                              <td>{{  date('d-m-Y', strtotime($meal->date))  }} </td>
                              
                                <td class="bg-{{ $bgcolor }}" style="color: #fff">  {{  $total_kcal }}  kcal</td>
                              <td> <button  data-bs-toggle="modal" data-bs-target="#infoModal"  class="btn btn-primary"  ><i class="bi bi-info-square-fill"></i></button> </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>      
                      </div>   
                    </div>
                  </div>
            
                                  @endcan
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @can('set_calories')

                <div class="card-header">Calories Limit</div>

                <div class="card-body">

                        <div class="input-group mb-1">
                            <input type="text" class="form-control" value="{{ $cal[0]->calories }}" aria-describedby="basic-addon2" readonly>
                            <div class="input-group-append">
                              <span class="input-group-text" id="basic-addon2">kcal</span>
                            </div>
                          </div>
                          <p style="color: #d1d1d1;font-size:12px">
                            {{-- Last Updated: {{ $cal[0]->updated_at }} --}}
                            Last Updated:  {{    date('d-m-Y', strtotime($cal[0]->updated_at)) }}, {{ date('H:i A', strtotime($cal[0]->updated_at))  }}
                          </p>
                          <button data-toggle="modal" data-target="#caloriesModal"class="btn btn-primary">Update Calories Limit</button>
                          {{-- <script type="text/javascript" src="{{ asset('js/calories_update.js') }}"></script> --}}
                          

                          @include('js.admin')
                        @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
