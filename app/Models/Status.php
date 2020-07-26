<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function register()
    {
        return $this->hasMany(Register::class);
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }
    protected $fillable = ['status_id', 'status_name'];
}
