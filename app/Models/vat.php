<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vat extends Model
{
    use HasFactory;
    protected $fillable = [
        "vat",
    ];

    public function products()
    {
        return $this->belongsToMany(products::class);
    }
}
