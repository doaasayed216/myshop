<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public const IS_ADMIN = 1;
    public const IS_SELLER = 2;
    public const IS_CUSTOMER = 3;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(fn($query) =>
            $query->where('name', 'like', '%' . $search . '%'));
        });
    }
}
