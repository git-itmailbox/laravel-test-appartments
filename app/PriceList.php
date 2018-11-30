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

        if (isset($searchCriteria['bedrooms']))
        {
            $query->byBedrooms($searchCriteria['bedrooms']);
        }

        if (isset($searchCriteria['bathrooms']))
        {
            $query->byBathrooms($searchCriteria['bathrooms']);
        }

        if (isset($searchCriteria['storeys']))
        {
            $query->byStoreys($searchCriteria['storeys']);
        }

        if (isset($searchCriteria['garages']))
        {
            $query->byGarages($searchCriteria['garages']);
        }

        if (isset($searchCriteria['price']))
        {
            $price = $searchCriteria['price'];

            //isset from && to
            if(isset($price['from'], $price['to']) )
            {
                $query->byPriceRange($price);
            }

            //isset only from
            if(isset($price['from']) && (!$price['to']))
            {
                $query->byPriceFrom($price['from']);
            }

            //isset only to
            if((!$price['from']) && ( isset($price['to'])))
            {
                $query->byPriceTo($price['to']);
            }
        }

        return $query;
    }

    public function scopeNameLike(Builder $query,  $name)
    {
        return $query->where('name', 'like', '%'.$name.'%');
    }

    public function scopeByBedrooms(Builder $query,  $bedrooms)
    {
        return $query->where('bedrooms', $bedrooms);
    }

    public function scopeByBathrooms(Builder $query,  $bathrooms)
    {
        return $query->where('bathrooms', $bathrooms);
    }

    public function scopeByStoreys(Builder $query,  $storeys)
    {
        return $query->where('storeys', $storeys);
    }

    public function scopeByGarages(Builder $query,  $garages)
    {
        return $query->where('garages', $garages);
    }

    public function scopeByPriceRange(Builder $query,  $price)
    {
        return $query->whereBetween('price', [$price['from'], $price['to']]);
    }

    public function scopeByPriceFrom(Builder $query,  $price)
    {
        return $query->where('price', '>', $price);
    }

    public function scopeByPriceTo(Builder $query,  $price)
    {
        return $query->where('price', '<', $price);
    }


}
