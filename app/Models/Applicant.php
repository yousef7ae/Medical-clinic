<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applicant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'description',
        'file',
        'status',
        'ad_id',
        'service_id',
        'category_id',
        'user_id',
        'payment_method',
        'country_id',
        'coupon',
    ];

    public function getFileAttribute($value)
    {
        if ($value) {
            return url('storage/' . $value);
        } else {
            return url('dashboard/images/1.png');
        }
    }

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

    static function payment_methodList($payment_method = "")
    {
        $array = [
            0 => 'الكاش',
            1 => 'بالتقسيط',
            2 => 'كاش ماني',
            3 => 'بيرفكت كاش',
        ];

        if ($payment_method === false) {
            return $array;
        }

        if (!is_string($payment_method) and $payment_method != false or $payment_method >= 0) {
            return !empty($array[$payment_method]) ? $array[$payment_method] : $payment_method;
        }

        return $array;
    }

    function service()
    {
        return $this->belongsTo(Service::class);
    }

    function category()
    {
        return $this->belongsTo(Category::class);
    }

    function ad()
    {
        return $this->belongsTo(Ad::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
