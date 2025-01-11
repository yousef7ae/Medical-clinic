<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use  SoftDeletes, HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'order',

    ];

    protected $hidden = ['deleted_at'];


    function submenus()
    {
        return $this->hasMany(Submenu::class);
    }

    public function getImageAttribute($value)
    {
        if ($value) {
            return url('storage/' . $value);
        } else {
            return url('dashboard/images/image1.png');
        }
    }
}
