<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Teacher extends Model
{
    protected $fillable = ['t_id', 'name', 'surname', 'gender', 'phone', 'email', 'village', 'district', 'province', 'education', 'image'];

    /* delete image form storage */
    public function deleteImage()
    {
        Storage::delete($this->image);
    }
    /* delete image form storage */
}
