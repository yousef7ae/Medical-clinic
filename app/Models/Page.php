<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use  SoftDeletes, HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'url',
        'order',
        'slug',
    ];

    protected $hidden = ['deleted_at'];

    public function getImageAttribute($value)
    {
        if ($value) {
            return url('storage/' . $value);
        } else {
            return url('dashboard/img/image1.png');
        }
    }

    static function statusList($status = "")
    {
        $array = [
            -1 => __('Decline'),
            0 => __('Pending'),
            1 => __('Accepted'),
        ];

        if ($status === false) {
            return $array;
        }

//        if(array_key_exists($status,$array)){
//            return $array[$status];
//        }

        if (!is_string($status) and $status != false or $status >= 0) {
            return !empty($array[$status]) ? $array[$status] : $status;
        }

        return $array;
    }
}
