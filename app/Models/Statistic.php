<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Statistic extends Model
{
    use  SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'value',
    ];

    public function getImageAttribute($value)
    {
        if ($value) {
            return url('storage/' . $value);
        } else {
            return  url('front/img/icon4.png');
        }
    }
}
