<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'type_document',
        'serie_document',
        'number_document',
        'tax',
        'total',
        'status',
        'created_at',
        'updated_at',
        'client_id',
        'product_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
