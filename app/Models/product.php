<?php

namespace App\Models;

use App\Models\Product as ModelsProduct;
use Database\Factories\BrandFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\fruitspecies;
use App\Models\category;
use App\Models\brand;
use App\Models\vat;
use App\Models\user;
use App\Models\country;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "barcode",
        "description",
        "categoryID",
        "vintage",
        "capacity",
        "alcohol",
        "brandID",
        "fruitspeciesID",
        "vatID",
        "price",
        "actionprice",
        "quantity",
        "picturename",
        "createduserID",
        "countryID",
    ];
    public function brands()
    {
        return $this->belongsTo(brand::class);
    }
    public function fruitspacies()
    {
        return $this->belongsTo(fruitspecies::class);
    }
    public function categories()
    {
        return $this->belongsTo(category::class);
    }
    public function vats()
    {
        return $this->belongsTo(vat::class);
    }
    public function users()
    {
        return $this->belongsTo(user::class);
    }
    public function contry()
    {
        return $this->belongsTo(country::class);
    }

    // public function categories()
    // {
    //     return $this->belongsToMany(Category::class);
    // }

}
