<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function getRating()
    {
        $a=$this->rating;
        $rate='';
        for ($i=0; $i<$a ; $i++) {
            $rate.= '<i class="ion-android-star"></i>';
        }
        echo $rate;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImg::class);
    }

    public function availability($a)
    {
        $stock=(int)($this->stocks);
        if($stock>=$a)
        {
            return true;
        }
        else{
            return false;
        }
    }
}
