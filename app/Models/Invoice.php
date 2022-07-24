<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';
    protected $fillable =[

        'date',
        'customer_id',
        'created_at',
        'updated_at',
    ];


    public function customer(){
        return $this->belongsTo('App\Models\Customer');
    }

    public function product(){
        return $this->belongsToMany('App\Models\Product');
    }
}
