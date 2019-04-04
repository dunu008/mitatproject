<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use DB;

class TestResultsController extends Controller
{

    //view test results
    public function index()
    {
        $applicants = Applicant::orderBy('id','asc')->paginate(8);
        return view('results.index')->with('applicants',$applicants);
    }

    //delete test results
    public function destroy($id)
    {
        $applicant = Applicant::find($id);
        $applicant->update(['sectionA'=>null,'sectionB'=>null,'sectionC'=>null]);

        return redirect('/test-results')->with('success','Result has been deleted');
    }

    //edit test results
    public function edit($id)
    {
        $applicant = Applicant::find($id);
        return view('results.edit',compact('applicant'));
    }

    //update test results
    public function update(Request $request, $id)
    {
        $request->validate([
            'totalA'      =>'required',
            'totalB'      =>'required',
            'totalC'      =>'required'
            ]);

            $applicant = Applicant::find($id);
            $applicant->sectionA       = $request->get('totalA');
            $applicant->sectionB       = $request->get('totalB');
            $applicant->sectionC       = $request->get('totalC');
            $applicant->save();

            return redirect('/test-results')->with('success','Results has been updated');
    }

    //view to add multiple test results
    public function create()
    {
        $applicants = DB::table('applicants')->whereNull('sectionA')->get();
        return view('results.create')->with('applicants',$applicants);
    }

    //save multiple test results
    public function saveMultiple(Request $request){

        foreach($request->get('applicants', []) as $applicant) {
            DB::table('applicants')->where('id', $applicant['id'])->update(array_except($applicant, ['id']));
        }
        
        return redirect('/test-results')->with('success','Results has been updated');

    }
}
