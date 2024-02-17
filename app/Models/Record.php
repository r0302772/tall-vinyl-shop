<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;
use Storage;

class Record extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Add additional attributes that do not have a corresponding column in your database
    protected function genreName(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => Genre::find($attributes['genre_id'])->name,
        );
    }

    protected function priceEuro(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) =>  Number::currency($attributes['price'], 'EUR'),
        );
    }

    protected function cover(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                $coverPath = 'covers/' . $attributes['mb_id'] . '.jpg';
                return (Storage::disk('public')->exists($coverPath))
                    ? Storage::url($coverPath)
                    : Storage::url('covers/no-cover.png');
            },
        );
    }

    protected $appends = ['genre_name', 'price_euro', 'cover'];

    // Relationship between models
    public function genre()
    {
        return $this->belongsTo(Genre::class)->withDefault();   // a record belongs to a "genre"
    }

    //  Apply the scope to a given Eloquent query builder
    public function scopeMaxPrice($query, $price = 100)
    {
        return $query->where('price', '<=', $price);
    }

    public function scopeSearchTitleOrArtist($query, $search = '%')
    {
        return $query->where('title', 'like', "%{$search}%")
            ->orWhere('artist', 'like', "%{$search}%");
    }
}
