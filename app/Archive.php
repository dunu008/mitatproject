<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $fillable = [
        'appliedYear',
        'applicantId',
        'fullname',
        'surname',
        'nic',
        'al_zscore',
        'district',
        'al_sub1',
        'al_sub1_result',
        'al_sub2',
        'al_sub2_result',
        'al_sub3',
        'al_sub3_result',
        'al_english',
        'ol_maths',
        'ol_english',
        'priority',
        'sectionA',
        'sectionB',
        'sectionC',
        'qualified'
    ];

}
