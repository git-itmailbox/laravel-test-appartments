<?php

namespace App\Http\Controllers;

use App\PriceList;
use Illuminate\Http\Request;

class ListController extends Controller
{
    //
    public function getList(Request $request)
    {
        $searchCriteria = $request->get('searchCriteria',[]);
        if (empty($searchCriteria))
        {
            return PriceList::all();
        }

        $list = PriceList::complexSearch($searchCriteria)->get();

        return $list;
    }
}
