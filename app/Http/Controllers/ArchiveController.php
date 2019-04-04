<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Applicant;
use DB;

class ArchiveController extends Controller
{
    //view archives
    public function index(){
        $archiveData = DB::table('archives')->get();
        return view('archives.index',compact('archiveData'));
    }

    //archive current year
    public function addCurrentYear(){

        $applicantData = DB::table('applicants')->get();

        foreach($applicantData as $data){

            $year = Carbon::createFromFormat('Y-m-d H:i:s',$data->created_at)->year;

            DB::table('archives')->insert(['applicantId'=>$data->id, 'fullname'=>$data->fullname, 'appliedYear'=>$year, 'nic'=>$data->nic,
                                            'al_zscore'=>$data->al_zscore,'district'=>$data->district,'al_sub1'=>$data->al_sub1,
                                            'al_sub1_result'=>$data->al_sub1_result,'al_sub2'=>$data->al_sub2,'al_sub2_result'=>$data->al_sub2_result,
                                            'al_sub3'=>$data->al_sub3,'al_sub3_result'=>$data->al_sub3_result,'al_english'=>$data->al_english,
                                            'ol_maths'=>$data->ol_maths,'ol_english'=>$data->ol_english,'priority'=>$data->priority,
                                            'sectionA'=>$data->sectionA,'sectionB'=>$data->sectionB,'sectionC'=>$data->sectionC,'qualified'=>$data->qualified ]);
        }
        
        Applicant::truncate();

        $archiveData = DB::table('archives')->get();
        return view('archives.index',compact('archiveData'));
    }

    //view summary
    public function viewSummary(){

        $summaryInfo = DB::table('archives')
                        ->select('appliedYear', DB::raw('count(*) as total , count(sectionA) as sectionA'))
                        ->groupBy('appliedYear')
                        ->get();

        $qualified = DB::table('archives')
                        ->select('appliedYear', DB::raw('count(*) as qualify , min(sectionA) as minA , min(sectionB) as minB , min(sectionC) as minC , min(sectionA+sectionB+sectionC) as minTotal'))
                        ->where('qualified','Y')
                        ->groupBy('appliedYear')
                        ->get();

        echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa".$summaryInfo;
            
        return view('archives.summary',compact('summaryInfo','qualified'));
    }
    

}
