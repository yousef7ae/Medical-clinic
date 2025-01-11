<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Revenue extends Model
{
    use  SoftDeletes, HasFactory;

    protected $fillable = [
        'revenue_type',
        'category_id',
        'patient_id',
        'date',
        'payment_method',
        'check_number',
        'check_date',
        'notes',
        'user_id',
        'amount',
        'total_amount',
        'remainder_amount',
    ];

    static function revenue_typeList($revenue_type = "")
    {
        $array = [
            1 => 'كشفية',
            2 => 'فحوصات دم',
        ];

        if ($revenue_type === false) {
            return $array;
        }

        if (!is_string($revenue_type) and $revenue_type != false or $revenue_type >= 0) {
            return !empty($array[$revenue_type]) ? $array[$revenue_type] : $revenue_type;
        }

        return $array;
    }

    static function revenue_type2List($revenue_type2 = "")
    {
        $array = [
            3 => 'ثمن العلاجات',
            4 => 'الجلسات العلاجية',
        ];

        if ($revenue_type2 === false) {
            return $array;
        }

        if (!is_string($revenue_type2) and $revenue_type2 != false or $revenue_type2 >= 0) {
            return !empty($array[$revenue_type2]) ? $array[$revenue_type2] : $revenue_type2;
        }

        return $array;
    }

    static function revenue_type_allList($revenue_type2 = "")
    {
        $array = [
            1 => 'كشفية',
            2 => 'فحوصات دم',
            3 => 'ثمن العلاجات',
            4 => 'الجلسات العلاجية',
        ];

        if ($revenue_type2 === false) {
            return $array;
        }

        if (!is_string($revenue_type2) and $revenue_type2 != false or $revenue_type2 >= 0) {
            return !empty($array[$revenue_type2]) ? $array[$revenue_type2] : $revenue_type2;
        }

        return $array;
    }

    static function payment_methodList($payment_method = "")
    {
        $array = [
            1 => 'نقدي',
            2 => 'شيكات',
            3 => 'بطاقة دفع',
        ];

        if ($payment_method === false) {
            return $array;
        }

        if (!is_string($payment_method) and $payment_method != false or $payment_method >= 0) {
            return !empty($array[$payment_method]) ? $array[$payment_method] : $payment_method;
        }

        return $array;
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
