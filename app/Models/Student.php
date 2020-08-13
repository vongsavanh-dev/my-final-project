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
        'st_tel',
        'st_village',
        'st_dob',
        'religion',
        'parent_name',
        'parent_tel',
        'district_id'

    ];


    public function register()
    {
        return $this->hasMany(Student::class);
    }
    public function district()
    {
        return $this->hasMany(district::class);
    }
}
