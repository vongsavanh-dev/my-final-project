<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['sub_id', 'sub_name', 'credit', 'major_id'];


    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }
}
