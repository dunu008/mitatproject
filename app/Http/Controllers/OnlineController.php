<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnlineController extends Controller
{
    public function viewRegistration(){
        return view('webpages.onlineRegistration');
    }

    public function postRegistration(Request $request){
        $request->validate([
            'fullname'      =>'required',
            'surname'       =>'required',
            'nic'           =>'required',
            'addressline1'  =>'required',
            'addressline2'  =>'required',
            'addressline3'  =>'required',
            'telephone'     =>'required',
            'alindex'       =>'required',
            'zscore'        =>'required',
            'district'      =>'required',
            'al_sub1'       =>'required',
            'al_sub1_result'=>'required',
            'al_sub2'       =>'required',
            'al_sub2_result'=>'required',
            'al_sub3'       =>'required',
            'al_sub3_result'=>'required',
            'alenglish'     =>'required',
            'olyear'        =>'required',
            'olmathematics' =>'required',
            'olenglish'     =>'required',
            'priority'      =>'required'
        ]);


        // LEFT FIELD 'DB' & RIGHT 'VIEW FIELD'
        $applicant = new Applicant([
            'fullname'      => $request->get('fullname'),
            'surname'       => $request->get('surname'),
            'nic'           => $request->get('nic'),
            'address'       => $request->get('addressline1').','.$request->get('addressline2').','.$request->get('addressline3').'.',
            'telephone'     => $request->get('telephone'),
            'al_index'      => $request->get('alindex'),
            'al_zscore'     => $request->get('zscore'),
            'district'      => $request->get('district'),
            'al_sub1'       => $request->get('al_sub1'),
            'al_sub1_result'=> $request->get('al_sub1_result'),
            'al_sub2'       => $request->get('al_sub2'),
            'al_sub2_result'=> $request->get('al_sub2_result'),
            'al_sub3'       => $request->get('al_sub3'),
            'al_sub3_result'=> $request->get('al_sub3_result'),
            'al_english'    => $request->get('alenglish'),
            'ol_year'       => $request->get('olyear'),
            'ol_maths'      => $request->get('olmathematics'),
            'ol_english'    => $request->get('olenglish'),
            'priority'      => $request->get('priority')
        ]);

        $applicant->save();
        return redirect('/online-registration')->with('success','You are now registered with system');
    }

    public function viewQualified(){
        return view('webpages.viewResults');
    }
}
