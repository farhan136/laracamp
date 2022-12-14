<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_users',
        'id_camps',
        'card_number',
        'expired',
        'cvc',
        'is_paid'
    ];


    public function Camp(){
        return $this->belongsTo(Camp::class, 'id_camps', 'id');
    }

    public function User(){
        return $this->belongsTo(User::class, 'id_users', 'id');
    }

    // public function setExpiredAttribute($value)
    // {
    //     $this->attribute('expired') = date('Y-m-t', strtotime($value));
    // }
}
