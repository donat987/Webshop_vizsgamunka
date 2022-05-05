<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fruitspecies extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "picture",
    ];

    public function products()
    {
        return $this->belongsToMany(products::class);
    }
}
