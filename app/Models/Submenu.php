<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Submenu extends Model
{
    use  SoftDeletes, HasFactory;

    protected $fillable = ['name','url','order','menu_id'];

    protected $hidden = ['deleted_at'];

    public function getImageAttribute($value)
    {
        if ($value) {
            return url('storage/' . $value);
        } else {
            return  url('dashboard/images/image1.png');
        }
    }

    function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
