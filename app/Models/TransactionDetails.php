<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_transaction', 'id_product', 'price', 'quantity'
    ];

    protected $hidden = [];


    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'id_product');
    }

    public function transaction()
    {
        return $this->hasOne(Transactions::class, 'id', 'id_transaction');
    }
}
