<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use  SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'date',
        'notes',
        'user_id',
        'total_amount',
        'remainder_amount',
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }

}
