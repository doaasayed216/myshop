<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class)->withPivot('quantity');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(fn($query) =>
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%'));
        });

        $query->when($filters['category'] ?? false, fn ($query, $category) =>
        $query->whereHas('category', fn($query) => $query->where('id', $category)));

        $query->when($filters['price'] ?? false, function ($query, $price) {
            $query->where(fn($query) =>
            $query->whereBetween('price', [0, $price]))->orderBy('price');
        });

    }
}
