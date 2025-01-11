<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'category_id',
        'doctor_id',
        'patient_id',
        'number',
        'reservation_type_id',
        'booking_list',
        'date',
        'time_from',
        'time_to',
        'amount',
        'notes',
        'user_id',
    ];

    static function statusList($status = "")
    {
        $array = [
            0 => __('Awaiting review'),
            1 => __('Acceptable'),
            2 => __('Disabled'),
        ];

        if ($status === false) {
            return $array;
        }

        if (!is_string($status) and $status != false or $status >= 0) {
            return !empty($array[$status]) ? $array[$status] : $status;
        }

        return $array;
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function doctor()
    {
        return $this->belongsTo(User::class , 'doctor_id');
    }

    function category()
    {
        return $this->belongsTo(Category::class);
    }

    function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
