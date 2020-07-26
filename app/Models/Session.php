<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    public function register()
    {
        return $this->hasMany(Register::class);
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }
    protected $fillable = ['session_id', 'session_name'];
}
