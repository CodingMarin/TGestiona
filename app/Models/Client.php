<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'street',
        'type_document',
        'document',
        'updated_at',
    ];

    public function sale()
    {
        return $this->hasMany(Sale::class);
    }
}
