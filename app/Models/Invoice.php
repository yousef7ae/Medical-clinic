<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use  SoftDeletes, HasFactory;

    protected $fillable = [
        'amount',
        'payment_method_id',
        'user_id',
        'status',
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function category()
    {
        return $this->belongsTo(Category::class);
    }


    static function statusList($status = "")
    {
        $array = [
            0 => __('Pending'),
            1 => __('Completed'),
            2 => __('Cancel'),
        ];

        if ($status === false) {
            return $array;
        }

        if (!is_string($status) and $status != false or $status >= 0) {
            return !empty($array[$status]) ? $array[$status] : $status;
        }

        return $array;
    }

}
