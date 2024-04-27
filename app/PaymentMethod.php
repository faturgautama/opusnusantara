<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = [
        'name', 'code', 'type', 'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];
}
