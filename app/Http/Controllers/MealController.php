<?php

namespace App\Http\Controllers;

use App\Meal;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use Response;
use DB;
use Auth;
class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $data = Meal::where('user_id', '=', Auth::user()->id)
        ->select('date')->distinct()->get();

        return view('meals', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editModal(Request $request)
    {
        $meal = $request->input('meal');
        $data = Meal::where('meal', '=', $meal)->get();
        return Response::json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meal = new Meal;
        $meal->user_id = Auth::user()->id;
        $meal->meal = $request->input('meal');
        $meal->calories = $request->input('calories');
        $meal->date = $request->input('date');
        $meal->time = $request->input('time');
        $meal->save();
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $date = $request->input('date');
        $meals = Meal::where('date', '=', $date)->get();
        $total= DB::table('meals')
        ->where('date', '=', $date)
        ->sum('calories');

        $data = array(
            "meals" => $meals,
            "count" => count($meals),
            "total" => $total
        );
    
        return Response::json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
        $date = $_GET['date'];
        $data = Meal::where('date', $date)->get();
        return view('meal_edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $cal = $request->input('calories');
        $meal = $request->input('meal');
        $meal_ = $request->input('meal_e');
        $time = $request->input('time');
        $fdate = $request->input('date');
        $date = date("Y-m-d", strtotime($fdate));

        DB::table('meals')
              ->where('meal', $meal_)
              ->update([
                  'calories' => $cal,
                  'meal' => $meal,
                  'date' => $date,
                  'time' => $time
                  ]);
    }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $meal = $request->input('meal');
        DB::table('meals')->where('meal', '=', $meal)->delete();

    }

    public function deleteDate(Request $request)
    {
        $date = $request->input('date');
        DB::table('meals')->where('date', '=', $date)->delete();
        
    }
}
