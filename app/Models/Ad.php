<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ad extends Model
{
    use  SoftDeletes, HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'date',
        'status',

    ];



    public function getImageAttribute($value)
    {
        if ($value) {
            return url('storage/' . $value);
        } else {
            return  url('front/img/Backgroundimg-modal.jpg');
        }
    }


    static function statusList($status = ""){
        $array =  [
            0 => __('InActive'),
            1 => __('Active'),
        ];

        if($status === false){
            return $array;
        }

        if(array_key_exists($status,$array)){
            return $array[$status];
        }

        return $array;
    }
}
