<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
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

    public function scopeComplexSearch($query, $searchCriteria)
    {
        if (isset($searchCriteria['name']))
        {
            $query->nameLike($searchCriteria['name']);
        }

        return $query;
    }

    public function scopeNameLike(Builder $query,  $name)
    {
        return $query->where('name', 'like', '%'.$name.'%');
    }

}
