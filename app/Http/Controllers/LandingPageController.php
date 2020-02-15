<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $doll_shoes = Product::where('sc_id', 3)->where('is_active', 1)->get();
        $mules = Product::where('sc_id', 4)->where('is_active', 1)->get();
        $two_inches = Product::where('sc_id', 1)->where('is_active', 1)->get();
        $half_inch = Product::where('sc_id', 2)->where('is_active', 1)->get();
        $birks = Product::where('sc_id', 5)->where('is_active', 1)->get();
        $ssd = Product::where('sc_id', 6)->where('is_active', 1)->get();
        $sales = Product::where('is_sale', 1)->where('is_active', 1)->get();
        return view('primabelle', compact('doll_shoes', 'mules', 'two_inches', 'half_inch', 'birks', 'sales','ssd'));

    }
}
