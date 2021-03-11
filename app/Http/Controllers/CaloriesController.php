<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calories;
use DB;

class CaloriesController extends Controller
{
    public function index()
    {
        //
    }

    public function update(Request $request)
    {
        $cal = $request->input('kcal');

        DB::table('calories')
              ->update(['calories' => $cal]);
    }
}