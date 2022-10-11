<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    //
    public function data(){
        $data = DB::table('employee AS e')
            ->select('e.name AS manager', 'm.name AS name')
            ->join('employee AS m', 'm.manager_id', '=', 'e.id')
            // ->where('countries.country_name', $country)
            ->get();

        // dd($data);   
        return view('employee',compact('data'));         
    }
}
