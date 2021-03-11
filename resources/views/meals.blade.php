@extends('layouts.app')
<?php
$cal = DB::table('calories')
->get();
$calories = $cal[0]->calories;
?>

@section('user')

@can('edit_meal')
<?php
$x = 1;
$bgcolor = "";
$cssbgcolor = "";

$msg = "";
                      
?>



<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
                        <div class="card-header"> Meals </div>

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
                              @foreach($data as $meal)
                              <?php
                              $total_kcal = DB::table('meals')
                              ->where('user_id', '=', Auth::user()->id)
                              ->where('date', '=', $meal->date)
                              ->sum('calories');
                                 if($total_kcal <= $calories){
                                $bgcolor = "success";
                                $msg = "Good Form!";
                                $cssbgcolor = "green";

                              }
                              else{
                                $bgcolor = "danger";
                                $cssbgcolor = "red";
                                $msg = "Calories recommendation exceeded!";
                              }
            ?>
                              <tr>
                              <th scope="row">{{$x++}}</th>
                              <td>{{  date('d-m-Y', strtotime($meal->date))  }} </td>
                              
                                <td class="bg-{{ $bgcolor }}" style="color: #fff">  {{  $total_kcal }}  kcal</td>
                              <td> <button  data-bs-toggle="modal" value="{{ $meal->date }}" data-bs-target="#infoModal"  id="dateM" class="editbtn btn btn-primary"  ><i class="bi bi-info-square-fill"></i></button>
                              <a href="meal_edit?date={{ $meal->date }}" value="{{ $meal->date }}" data-bs-target="#editModal"  id="dateM" class="editbtn btn btn-primary"  ><i class="bi bi-pen"></i></a> 
                              <button value="{{ $meal->date }}" id="delD" class="delD btn btn-danger"  ><i class="bi bi-trash"></i></button> </td>
                            </tr>
                              @endforeach
                              
                            </tbody>
                          </table>
                          <button  data-bs-target="#addMeal" data-bs-toggle="modal" id="addM" class="addM btn btn-primary"> Create new Meal </button> </td>
                        </div>      
                      </div>   
                    </div>
                  </div>
               @include('modals.user-modals')
               @include('js.info')

                                  @endcan
                                  @endsection