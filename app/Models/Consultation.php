<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultation extends Model
{
    use  SoftDeletes, HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'serial_number',
        'category_id',
        'disease',
        'type',
        'date',
        'amount',
        'notes',
        'user_id',
        'job',
        'weight',
        'height',
        'previous_operations',
        'address',
        'insurance_id',
        'medical_history',
        'medical_history_text',
        'medical_history_drug',
        'other_diagnosis',
        'surgery',
        'surgery_text',
        'surgery_date',
        'other_surgery',
        'other_medication',
        'lab',
        'international_index',
        'examination',
        'impression_recommendation',
        'image',

        'allergy',
        'allergy_text',
        'allergy_date',

        'medical_history2',
        'medical_history_text2',
        'medical_history_drug2',

        'medical_history3',
        'medical_history_text3',
        'medical_history_drug3',

        'surgery2',
        'surgery2_text',
        'surgery2_date',

        'surgery3',
        'surgery3_text',
        'surgery3_date',
        'drug_allergies',
    ];

    static function typeList($type = "") {
        $array =  [
            1 => __('Medical consultation'),
            2 => __('Therapy sessions'),
//            3 => __('Free Consultation'),
//            4 => __('Paid Consultation'),
        ];

        if($type === false){
            return $array;
        }

        if(array_key_exists($type,$array)){
            return $array[$type];
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

    function attachments(){
        return $this->hasMany(PatintConsultionAttach::class,'consultations_id');
    }
}
