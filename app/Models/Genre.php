<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Add attributes to be hidden to the $hidden array
    protected $hidden = ['created_at', 'updated_at'];

    // Accessors and mutators (method name is the attribute name)
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucfirst($value),         // accessor
            set: fn($value) => strtolower($value),      // mutator
        );
    }

    // Relationship between models
    public function records()
    {
        return $this->hasMany(Record::class);   // a genre has many "records"
    }
}
