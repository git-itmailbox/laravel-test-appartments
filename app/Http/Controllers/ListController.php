<?php

namespace App\Http\Controllers;

use App\PriceList;
use Illuminate\Http\Request;

class ListController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('index');
    }
}
