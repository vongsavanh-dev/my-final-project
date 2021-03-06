<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    protected $fillable = ['Ac_id', 'Ac_name'];

    public function register()
    {
        return $this->hasMany(Register::class);
    }
}
