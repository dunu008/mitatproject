<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ApplicantController extends Controller
{
    //view applicants 
    public function viewApplicants(){
        $applicants = DB::table('applicants')->get();
        return view('applicants.index')->with('applicants',$applicants);
    }

    //search applicants
    public function viewApplicantsSearch(Request $request){
        if($request->ajax()){
            $output="";
            $applicantRecords = DB::table('applicants')
                        ->select(DB::raw("*"))
                        ->where('id','=',$request->searchText)
                        ->orWhere('fullname','like',$request->searchText.'%')
                        ->orWhere('nic','like',$request->searchText.'%')
                        ->orWhere('district','like',$request->searchText.'%')
                        ->orWhere('al_index','like',$request->searchText)
                        // ->orWhere('al_zscore','>',$request->searchText)
                        // ->orWhere('sectionA','>',$request->searchText)
                        // ->orWhere('sectionB','>',$request->searchText)
                        // ->orWhere('sectionC','>',$request->searchText)
                        ->orWhere('qualified','like',$request->searchText)
                        ->get();

            if($applicantRecords){
                foreach ($applicantRecords as $key => $applicant) {
                    $output.='<tr>'.
                            '<td>'.$applicant->id.'</td>'.
                            '<td>'.$applicant->fullname.'</td>'.
                            '<td>'.$applicant->nic.'</td>'.
                            '<td>'.$applicant->district.'</td>'.
                            '<td>'.$applicant->al_index.'</td>'.
                            '<td>'.$applicant->al_zscore.'</td>'.
                            '<td>'.$applicant->sectionA.'</td>'.
                            '<td>'.$applicant->sectionB.'</td>'.
                            '<td>'.$applicant->sectionC.'</td>'.
                            '<td>'.$applicant->qualified.'</td>'.
                            '</tr>';
                }
            }
            return Response($output);
        };
    }

    //statistics about selected applicants
    public function applicantStatistics(){
        return view('applicants.statistics');
    }

    //PIE CHART
    public function applicantPieChart(){

        $result1 = DB::table('applicants')
                    ->select('district', DB::raw('count(*) as total'))
                    ->groupBy('district')
                    ->where('qualified','Y')
                    ->get();

        return response()->json($result1);
    }

    //SCATTER PLOT
    public function applicantScatterPlot(){

        $result2 = DB::table('applicants')
                    ->select('district', DB::raw('min(al_zscore) as min'), DB::raw('max(al_zscore) as max'))
                    ->groupBy('district')
                    ->where('qualified','Y')
                    ->get();

        return response()->json($result2);
    }
}
