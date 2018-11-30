<?php

namespace App\Http\Controllers;

use App\PriceList;
use Illuminate\Http\Request;

class ListController extends Controller
{
    //
    public function getList(Request $request)
    {
        $list = PriceList::all();
        return $list;
    }
}
