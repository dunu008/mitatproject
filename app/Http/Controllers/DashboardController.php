<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function dashboard(){
        $applicantsCount = DB::table('applicants')->count();
        $testCenterCapacity = DB::table('venues')->sum('capacity');
        $facedTestCount = DB::table('applicants')->whereNotNull('sectionA')->count();
        $qualifiedCount = DB::table('applicants')->where('qualified','Y')->count();
        return view('dashboard.index')->with(compact('applicantsCount','testCenterCapacity','facedTestCount','qualifiedCount'));
    	//return view('pages.dashboard')->with('applicantsCount',$applicantsCount)->with('testCenterCapacity',$testCenterCapacity);
    }
}
