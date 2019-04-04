<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{

    protected $guarded = [
        'id'
    ];
    
    protected $fillable = [
        'name',
        'capacity',
        'location'
    ];

    public function applicant()
    {
        return $this->hasMany('App\Applicant');
    }
}
