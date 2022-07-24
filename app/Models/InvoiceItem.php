<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $table = 'invoices_item';
    protected $fillable =[

        'invoice_id',
        'product_id',
        'qty',
        'price',
        'total',
    ];
}
