@extends('layouts.app')


@section('new_meal')

@can('edit_meal')
<div class="container">
<h2>Add new Meal:</h2>
<form class="addMeal">
  {{ csrf_field() }}
  {{-- {{ method_field('POST') }} --}}
<div class="input-group bg-light" style="border-radius: 12px">
<input type="text" placeholder="Meal" class="form-control" id="meal_" >
<input placeholder="Calories" type="text" class="form-control"  id="caloo" >
<span class="input-group-text bg-light">kcal</span>
</div>

<input type="date" class="form-control" readonly value="{{ $_GET['date']}}"  id="datee">
<input type="time" class="form-control mb-2"  id="timee">
<button type="submit" value="" class="editBtn btn btn-primary mb-3"> Add </button>
{{-- <button  value="" class="deleteBtn btn btn-danger mb-3"> Delete </button> --}}

</form>      
</div>
    @include('js.addMeal')
    @endcan
@endsection

@section('edit_details')

<div class="container">
  <h2> Meals for Date: {{ date('d-m-Y', strtotime($_GET['date'])) }}  </h2>

        @foreach($data as $meal)

        <div class="container ">

        <div class="input-group bg-light" style="border-radius: 12px">
        <input type="text" class="input-group-text bg-light" value="{{$meal->meal}}">
          <input type="text" class="form-control bg-light" readonly  value="{{$meal->calories}}" aria-label="kcal">
            <span class="input-group-text bg-light">kcal</span>
          </div>

          <input type="date" class="form-control bg-info" readonly  value="{{$meal->date}}" aria-label="kcal">
          <input type="time" class="form-control mb-2 bg-info" readonly  value="{{$meal->time}}" aria-label="kcal">
          
          <button data-bs-toggle="modal" data-bs-target="#editModal"  value="{{$meal->meal}}" class="mdopen btn btn-primary mb-3"> Edit </button>

    </div>
    @endforeach
    
@include('js.edit')
@include('modals.edit-modal')
    
@endsection