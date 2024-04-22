<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
