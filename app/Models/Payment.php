<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['revenue_id', 'payment_name', 'payment_type', 'amount_paid', 'payment_date', 'payment_proof', 'payment_status'];

    public function revenue()
    {
        return $this->belongsTo(Revenue::class); // Relasi belongsTo ke Revenue
    }
}
