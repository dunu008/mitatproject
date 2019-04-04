<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venue;  
use App\Applicant;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venues = Venue::orderBy('id','asc')->paginate(5);
        return view('venues.index')->with('venues',$venues);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('venues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'capacity'=>'required|integer',
            'location'=>'required'
        ]);
        $venue = new Venue([
            'name'=>$request->get('name'),
            'capacity'=>$request->get('capacity'),
            'location'=>$request->get('location')
        ]);
        $venue->save();
        return redirect('/venues')->with('success','venue added');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venue = Venue::find($id);
        return view('venues.edit',compact('venue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'capacity'=>'required|integer',
            'location'=>'required'
        ]);

        $venue = Venue::find($id);
        $venue->name = $request->get('name');
        $venue->capacity = $request->get('capacity');
        $venue->location = $request->get('location');
        $venue->save();

        return redirect('/venues')->with('success','venue has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $applicantInVenue = Applicant::where('applicantvenue_fk',$id)->count();

        if($applicantInVenue==0){
            $venue = Venue::find($id);
            $venue->delete();
            return redirect('/venues')->with('success','venue has been deleted');
        }else{
            return redirect('/venues')->withErrors('You cannot delete venues which are assigned in admissions');
        }

        

        
    }
}
