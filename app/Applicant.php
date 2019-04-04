<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'fullname',
        'surname',
        'nic',
        'address',
        'telephone',
        'al_index',
        'al_zscore',
        'district',
        'al_sub1',
        'al_sub1_result',
        'al_sub2',
        'al_sub2_result',
        'al_sub3',
        'al_sub3_result',
        'al_english',
        'ol_year',
        'ol_maths',
        'ol_english',
        'priority',
        'sectionA',
        'sectionB',
        'sectionC',
        'qualified',
        'selected',
        'applicantvenue_fk'
    ];

    //for venue and applicant foreign key
    public function venue(){
        return $this->belongsTo('App\Venue','applicantvenue_fk');
    }



    
}
