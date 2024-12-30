<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'description',
        'amount',
    ];

    // Relasi ke Invoice
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
