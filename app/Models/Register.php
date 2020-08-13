<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $fillable = [
        'reg_id',
        'st_id',
        'reg_status',
        'major_id',
        'session_name',
        're_status',
        'academic_id',
        'classroom_id',

    ];

    /*  public function session()
    {
        return $this->belongsTo(Session::class);
    } */
    public function major()
    {
        return $this->belongsTo(Major::class);
    }
    /*  public function status()
    {
        return $this->belongsTo(Status::class);
    } */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function academic()
    {
        return $this->belongsTo(academic::class);
    }
    public function classroom()
    {
        return $this->belongsTo(classroom::class);
    }
}
