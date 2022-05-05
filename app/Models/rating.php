<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        "comment",
        "point",
        "userID",
        "productID",
    ];

    public function users() {
        return $this->hasMany(User::class);
    }
    public function products()
    {
        return $this->hasMany(product::class);
    }
}
