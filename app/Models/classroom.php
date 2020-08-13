<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class classroom extends Model
{
    protected $fillable = ['class_id', 'class_name',];

    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
