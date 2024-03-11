<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public function scopeName($query, $name)
    {
        return $query->where('name', 'like', '%' . $name . '%');
    }

    public function scopeBedrooms($query, $bedrooms)
    {
        return $query->where('bedrooms', $bedrooms);
    }
}
