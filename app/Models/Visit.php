<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visit extends Model
{
    use  SoftDeletes, HasFactory;

    protected $fillable = [
        'blood_pressure',
        'temperature',
        'sugar',
        'number_sessions',
        'waiting_list',
        'diagnosis',
        'notes',
        'detection_date',
        'visit_type_id',
        'user_id',
        'patient_id',
        'doctor_id',
        'category_id',
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

    static function visit_type_idList($visit_type_id = "")
    {
        $array = [
            0 => 'كشف مستعجل',
            1 => 'زيارة طارئ',
            2 => 'زيارة روتينية',
        ];

        if ($visit_type_id === false) {
            return $array;
        }

        if (!is_string($visit_type_id) and $visit_type_id != false or $visit_type_id >= 0) {
            return !empty($array[$visit_type_id]) ? $array[$visit_type_id] : $visit_type_id;
        }

        return $array;
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
        return $this->belongsTo(User::class , 'patient_id');
    }
}
