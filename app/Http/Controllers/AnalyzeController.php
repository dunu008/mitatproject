<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AnalyzeController extends Controller
{
    public function index(){
        return view('analysis.index');
    }

    public function filter(Request $request){
        if($request->ajax()){
            $output="";
            $allApplicants = DB::table('applicants')
                        ->select(DB::raw("*"))
                        ->where('sectionA','>=',$request->sectionA)
                        ->where('sectionB','>=',$request->sectionB)
                        ->where('sectionC','>=',$request->sectionC)
                        ->where(DB::raw('sectionA + sectionB + sectionC'),'>=',$request->total)
                        ->get();

            $allDistricts = DB::table('applicants')
                            ->select('district')
                            ->distinct()
                            ->get();

            $totalDistricts = DB::table('applicants')
                            ->distinct('district')
                            ->count('district');

            for( $i=0 ; $i<$totalDistricts ; $i++ ){
                $district = $allDistricts[$i]->district;
                $districtCount = $allApplicants->where('district','=',$district)->count();
                $districtMax = $allApplicants->where('district','=',$district)->max('al_zscore');
                $districtMin = $allApplicants->where('district','=',$district)->min('al_zscore');

                $output.='<tr>'.
                        '<td>'.($i+1).'</td>'.
                        '<td>'.$district.'</td>'.
                        '<td>'.$districtCount.'</td>'.
                        '<td>'.$districtMax.'</td>'.
                        '<td>'.$districtMin.'</td>'.
                        '</tr>';

            }
                return Response($output);
            }
        }


        public function setQualified(Request $request){

            $request->validate([
                'sectionA'      =>'required',
                'sectionB'      =>'required',
                'sectionC'      =>'required'
            ]);

            DB::table('applicants')
                        ->select(DB::raw("*"))
                        ->where('sectionA','>=',$request->sectionA)
                        ->where('sectionB','>=',$request->sectionB)
                        ->where('sectionC','>=',$request->sectionC)
                        ->where(DB::raw('sectionA + sectionB + sectionC'),'>=',$request->total)
                        ->update(['qualified'=>'Y']);

            DB::table('applicants')
                        ->select(DB::raw("*"))
                        ->where('sectionA','<',$request->sectionA)
                        ->orWhere('sectionB','<',$request->sectionB)
                        ->orWhere('sectionC','<',$request->sectionC)
                        ->orWhere(DB::raw('sectionA + sectionB + sectionC'),'<',$request->total)
                        ->update(['qualified'=>'N']);

            DB::table('applicants')
                        ->select(DB::raw("*"))
                        ->orWhereNull('sectionA')
                        ->orWhereNull('sectionB')
                        ->orWhereNull('sectionC')
                        ->update(['qualified'=>'N']);
            
            return redirect('/analyze')->with('success','Threshold limit for aptitude test is set');
        }

        //view statistics page for current year
        public function statictics(){
            return view('analysis.statistics');
        }

        //create chart for section A
        public function graphSectionA(){

            $result1 = DB::table('applicants')
                    ->select('sectionA', DB::raw('count(*) as totalA'))
                    ->groupBy('sectionA')
                    ->where('sectionA','>',0)
                    ->get();

            return response()->json($result1);
        }

        //create chart for section B
        public function graphSectionB(){

            $result2 = DB::table('applicants')
                    ->select('sectionB', DB::raw('count(*) as totalB'))
                    ->groupBy('sectionB')
                    ->where('sectionB','>',0)
                    ->get();

            return response()->json($result2);
        }

        //create chart for section C
        public function graphSectionC(){

            $result3 = DB::table('applicants')
                    ->select('sectionC', DB::raw('count(*) as totalC'))
                    ->groupBy('sectionC')
                    ->where('sectionC','>',0)
                    ->get();

            return response()->json($result3);
        }

        //create chart for total
        public function graphTotal(){

            $result4 = DB::table('applicants')
                    ->select(DB::raw('(sectionA + sectionB + sectionC) as sectionT'), DB::raw('count(*) as totalT'))
                    ->groupBy(DB::raw('sectionA + sectionB + sectionC'))
                    ->where(DB::raw('sectionA + sectionB + sectionC'),'>',0)
                    ->get();

            return response()->json($result4);
        }
    }

