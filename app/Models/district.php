<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    protected $fillable = ['dr_id', 'dr_name', 'dr_name_en', 'pr_id'];

    public function student()
    {
        return $this->belongsTo(student::class);
    }
}
