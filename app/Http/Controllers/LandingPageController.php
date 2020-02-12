<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $doll_shoes = Product::where('sc_id', 3)->where('is_active', 1)->get();
        return view('primabelle', compact('doll_shoes'));

    }
}
