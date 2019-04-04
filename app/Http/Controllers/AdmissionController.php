<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Applicant;
use App\Venue;
use PDF;

class AdmissionController extends Controller
{
    public function index()
    {
        $applicants = Applicant::with('venue')->paginate(12);

        $individualVenue = DB::table('venues')->select('id','capacity')->get();

        return view('admissions.index')->with(compact('applicants','individualVenue'));
    }

    public function edit(){

        $applicants = Applicant::with('venue')->get();

        $assignedCapacity = DB::table('applicants')->select('applicantvenue_fk',DB::raw('count(*) as total'))->groupBy('applicantvenue_fk')->pluck('total','applicantvenue_fk');  
        
        $venues = DB::table('venues')->select('id','name','capacity')->get();
        
        return view('admissions.edit')->with(compact('applicants','assignedCapacity','venues'));

    }

    public function saveAdmissions(Request $request){

        foreach($request->get('applicants', []) as $applicant) {
            DB::table('applicants')->where('id', $applicant['id'])->update(array_except($applicant, ['id']));
        }
        
        return app('App\Http\Controllers\AdmissionController')->edit();

    }

    public function downloadPDF($id){
        $applicant = Applicant::find($id);
  
        $pdf = PDF::loadView('admissions.pdf', compact('applicant'));
        return $pdf->download('applicant.pdf');
    }
}
