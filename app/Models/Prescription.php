<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{
    use  SoftDeletes, HasFactory;

    protected $fillable = [
        'name_drug',
        'number_drug',
        'medicine_dose',
        'medicine_unit',
        'number',
        'notes',
        'file',
        'user_id',
        'patient_id',
        'doctor_id',
        'category_id',
        'consultation_id',
        'take_method',
        'dosing_frequency',
        'date'
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


    static function take_methods_list()
    {
        $array = [
            0 => __('Po'),
            1 => __('I.M'),
            2 => __('Inj'),
            3 => __('S.c'),
        ];

        return $array;
    }

    static function dosing_frequencies_list()
    {
        $array = [
            0 => __('per day'),
            1 => __('per week'),
            2 => __('per month.'),
        ];


        return $array;
    }

    public function getFileAttribute($value)
    {
        if ($value){
            return url('storage/'.$value);
        }
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
    function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}
