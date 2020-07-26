<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'st_id',
        'st_name',
        'st_surname',
        'st_gender',
        'st_phone',
        'st_village',
        'st_city',
        'st_province',
        'st_dob',
        'st_religion',
        'father_name',
        'mother_name',
        'father_job',
        'mother_job',
        'father_phone',
        'mother_phone',
        'family_village',
        'family_city',
        'family_province',
        'major_id',
        'session_id',
        /*  'status_id', */

    ];
    public function status()
    {
        return $this->belongsTo(Status::class,);
    }
    public function session()
    {
        return $this->belongsTo(Session::class);
    }
    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
