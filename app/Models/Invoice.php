<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_name',
        'no_invoice',
        'invoice_date',
        'due_date',
        'project_id',
        'amount',
        'status',
    ];

    // Relasi ke Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Relasi ke InvoiceDetail
    public function invoiceDetail()
    {
        return $this->hasMany(InvoiceDetail::class);
    }
}
