<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{

    use SoftDeletes, HasRoles, HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'email',
        'gender',
        'birth_date',
        'mobile',
        'password',
        'status',
        'image',
        'user_id',
        'reset_code',
        'job',
        'insurance_id',
        'doctor_id',
        'category_id',
        'weight',
        'height',
        'previous_operations',
        'address',
        'id_number',
        // 'allergy',
        // 'allergy_text',

        // 'medical_history',
        // 'medical_history_text',
        // 'medical_history_drug',

        // 'medical_history2',
        // 'medical_history_text2',
        // 'medical_history_drug2',

        // 'medical_history3',
        // 'medical_history_text3',
        // 'medical_history_drug3',

        // 'surgery',
        // 'surgery_text',
        // 'surgery_date',

        // 'surgery2',
        // 'surgery2_text',
        // 'surgery2_date',

        // 'surgery3',
        // 'surgery3_text',
        // 'surgery3_date',

        // 'other_diagnosis',
        // 'other_surgery',
        // 'other_medication',
        // 'lab',
        // 'international_index',
        // 'examination',
        // 'impression_recommendation',
        // 'city_id',
        // 'birth_place',
        // 'occupation'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function getRoleIdAttribute()
    {
        return ($this->roles and (!empty($this->roles[0]))) ? $this->roles[0]->id : 0;
    }

    public function getImageAttribute($value)
    {
        return $value ? url('storage/' . $value) : url('front/img/doc.png');
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

    static function gender($gender = "")
    {
        $array = [
            1 => __('Single'),
            2 => __('Married'),
            3 => __('Divorced'),
            4 => __('Widowed'),
            5 => __('Separated'),
        ];

        if ($gender == "") {
            return $array;
        } else {
            return !empty($array[$gender]) ? $array[$gender] : $gender;
        }
    }

    static function gender_emp($gender_emp = "")
    {
        $array = [
            1 => __('Male'),
            2 => __('Female'),
        ];

        if ($gender_emp == "") {
            return $array;
        } else {
            return !empty($array[$gender_emp]) ? $array[$gender_emp] : $gender_emp;
        }
    }

    static function allergy($allergy = "")
    {
        $array = [
            1 => "Yes",
            2 => "No",
        ];

        if ($allergy == "") {
            return $array;
        } else {
            return !empty($array[$allergy]) ? $array[$allergy] : $allergy;
        }
    }

    static function employeeRole($employeeRole = "")
    {
        $array = [
            1 => __('Admin'),
            3 => __('Doctor'),
            4 => __('Nurse'),
            5 => __('Employee'),
            7 => __('Secretarial'),
        ];

        if ($employeeRole == "") {
            return $array;
        } else {
            return !empty($array[$employeeRole]) ? $array[$employeeRole] : $employeeRole;
        }
    }

    static function city_idList($city_id = ""){

        $array =  [
            1 => 'القدس',
            2 => 'رام الله',
        ];

        if($city_id === false){
            return $array;
        }

        if(array_key_exists($city_id,$array)){
            return $array[$city_id];
        }

        return $array;
    }

    function users()
    {
        return $this->hasMany(User::class);
    }

    function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    function category()
    {
        return $this->belongsTo(Category::class);
    }

    function doctor()
    {
        return $this->belongsTo(User::class , 'doctor_id');
    }

    function insurance()
    {
        return $this->belongsTo(Insurance::class);
    }
    public function consultations()
    {
        return $this->hasMany(Consultation::class , 'patient_id');
    }
}
