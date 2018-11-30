<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PriceList
 * @package App
 * @property $name string
 * @property $price int
 * @property $bedrooms int
 * @property $bathrooms int
 * @property $storeys int
 * @property $garages int
 */
class PriceList extends Model
{
    //
    protected $table = 'lists';

   protected $fillable = [
        'name',
        'price',
        'bedrooms',
        'bathrooms',
        'storeys',
        'garages',
   ];


}
