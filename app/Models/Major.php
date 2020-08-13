<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class  Major extends Model
{

    /**ເຊື່ອມກັບ ລົງທະບຽນ */
    public function register()
    {
        return $this->hasMany(Register::class);
    }

    public function subject()
    {
        return $this->hasMany(Subject::class, 'major_id');
    }



    protected $table = 'majors';
    protected $fillable = ['major_id', 'major_name'];
}
