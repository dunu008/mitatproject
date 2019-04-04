<?php

namespace App\Http\Controllers;
use App\Applicant;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{

    // view all registered applicants
    public function index()
    {
        $applicants = Applicant::orderBy('id','asc')->paginate(4);
        return view('registration.index')->with('applicants',$applicants);
    }

    //create single registration
    public function create_single()
    {
        return view('registration.create_single');
    }

    //store single registration
    public function store_single(Request $request)
    {
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
        return redirect('/registration')->with('success','New applicant registered');
    }

    //delete registered applicant
    public function destroy($id)
    {
        $applicant = Applicant::find($id);
        $applicant->delete();

        return redirect('/registration')->with('success','Applicant has been deleted');
    }

    //edit a registered applicant
    public function edit($id)
    {
        $applicant = Applicant::find($id);
        return view('registration.edit',compact('applicant'));
    }

    //update a registered applicant
    public function update(Request $request, $id)
    {
        $request->validate([
            'fullname'      =>'required',
            'surname'       =>'required',
            'nic'           =>'required',
            'address'       =>'required',
            'telephone'     =>'required',
            'district'      =>'required',
            'alindex'       =>'required',
            'zscore'        =>'required',
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

        $applicant = Applicant::find($id);
        $applicant->fullname       = $request->get('fullname');
        $applicant->surname        = $request->get('surname');
        $applicant->nic            = $request->get('nic');
        $applicant->address        = $request->get('address');
        $applicant->telephone      = $request->get('telephone');
        $applicant->district       = $request->get('district');
        $applicant->al_index       = $request->get('alindex');
        $applicant->al_zscore      = $request->get('zscore');
        $applicant->al_sub1        = $request->get('al_sub1');
        $applicant->al_sub1_result = $request->get('al_sub1_result');
        $applicant->al_sub2        = $request->get('al_sub2');
        $applicant->al_sub2_result = $request->get('al_sub2_result');
        $applicant->al_sub3        = $request->get('al_sub3');
        $applicant->al_sub3_result = $request->get('al_sub3_result');
        $applicant->al_english     = $request->get('alenglish');
        $applicant->ol_year        = $request->get('olyear');
        $applicant->ol_maths       = $request->get('olmathematics');
        $applicant->ol_english     = $request->get('olenglish');
        $applicant->priority       = $request->get('priority');
        $applicant->save();

        return redirect('/registration')->with('success','applicant has been updated');
    }

    //create multiple registration
    public function create_multiple(){
    	return view('registration.create_multiple');
    }

    //store multiple registration
    public function store_multiple(Request $request){

        $request->validate([
            'fullname'      =>'required',
            'surname'       =>'required',
            'nic'           =>'required',
            'address1'      =>'required',
            'address2'      =>'required',
            'address3'      =>'required',
            'telephone'     =>'required',
            'al_index'      =>'required',
            'al_zscore'     =>'required',
            'district'      =>'required',
            'al_sub1'       =>'required',
            'al_sub1_result'=>'required',
            'al_sub2'       =>'required',
            'al_sub2_result'=>'required',
            'al_sub3'       =>'required',
            'al_sub3_result'=>'required',
            'al_english'    =>'required',
            'ol_year'       =>'required',
            'ol_maths'      =>'required',
            'ol_english'    =>'required',
            'priority'      =>'required'
        ]);
        
        $input = Input::all();
        $condition = $input['fullname'];
        foreach ($condition as $key => $condition) {
            $applicant = new Applicant;
            $applicant->fullname        =   $input['fullname'][$key];
            $applicant->surname         =   $input['surname'][$key];
            $applicant->nic             =   $input['nic'][$key];
            $applicant->address         =   $input['address1'][$key].','.$input['address2'][$key].','.$input['address3'][$key];
            $applicant->telephone       =   $input['telephone'][$key];
            $applicant->al_index        =   $input['al_index'][$key];
            $applicant->al_zscore       =   $input['al_zscore'][$key];
            $applicant->district        =   $input['district'][$key];
            $applicant->al_sub1         =   $input['al_sub1'][$key];
            $applicant->al_sub1_result  =   $input['al_sub1_result'][$key];
            $applicant->al_sub2         =   $input['al_sub2'][$key];
            $applicant->al_sub2_result  =   $input['al_sub2_result'][$key];
            $applicant->al_sub3         =   $input['al_sub3'][$key];
            $applicant->al_sub3_result  =   $input['al_sub3_result'][$key];
            $applicant->al_english      =   $input['al_english'][$key];
            $applicant->ol_year         =   $input['ol_year'][$key];
            $applicant->ol_maths        =   $input['ol_maths'][$key];
            $applicant->ol_english      =   $input['ol_english'][$key];
            $applicant->priority        =   $input['priority'][$key];
            $applicant->save();
        }
        return redirect('/registration')->with('success','New applicants have been added');
    }
}
