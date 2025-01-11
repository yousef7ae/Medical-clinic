<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Analyse extends Model
{
    use  SoftDeletes, HasFactory;

    protected $fillable = [
        'patient_id',
        'category_id',
        'doctor_id',
        'name',
        'analyse_number',
        'analyse_result',
        'analyse_date',
        'notes',
        'file',
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

    public function getFileAttribute($value)
    {
        if ($value) {
            return url('storage/' . $value);
        }
    }

    function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
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
