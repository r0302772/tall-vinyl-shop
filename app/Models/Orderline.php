<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderline extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relationship between models
    public function order()
    {
        return $this->belongsTo(Order::class)->withDefault();   // an orderline belongs to an "order"
    }
}
