<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ShoeCategory;
use App\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      

        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shoe_cats = ShoeCategory::where('is_active', 1)->get();
        return view('product.add-product', compact('shoe_cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $balodator = $request->validate( [
            'description' => 'required|unique:products|max:255',
            'old_price' => 'required',
        ]);

        return $balodator;
       

        Product::create([
            'uid' => \Str::uuid(),
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'sc_id' => $request->sc_id,
            'size' => $request->size,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'stock' => $request->stock,
            'photo_name' => $request->photo_name
        ]);
        return redirect()->back()->with('success', 'Product Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
