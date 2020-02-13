<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use App\ShoeCategory;
use App\Product;
use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Alert::success('Success Title', 'Success Message');

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

        $validatorrr = Validator::make($request->all(), [
            'code' => 'required|unique:products',
            'name' => 'required',
            'description' => 'required',
            'sc_id' => 'required',
            'size' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'size' => 'required|numeric|min:0',
            'photo_name' => 'required|image'
        ]);

        if ($validatorrr->fails()) {
            return redirect()->back()->withInput()->with('error', $validatorrr->messages());
        }

    
        $file = $request->file('photo_name');
        $name = time() . $file->getClientOriginalName();
        

        Product::create([
            'uid' => \Str::uuid(),
            'code' => strtoupper($request->code),
            'name' => $request->name,
            'description' => $request->description,
            'sc_id' => $request->sc_id,
            'size' => $request->size,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'stock' => $request->stock,
            'ribbon_tag' => $request->ribbon_tag,
            'is_sale' => $request->is_sale,
            'photo_name' => $name
        ]);

        $file->move(public_path('images'), $name);

        //  $path = $request->photo_name->store('images');
        //  $path->save();
        
        // $image = $request->file('photo_name');
        // $filename = date('Y-m-d-H:i:s')."-".$image->getClientOriginalName();
        // Image::make($image->getRealPath())->resize(468, 249)->save('public/img/products/'.$filename);
        // $product->image = 'img/products/'.$filename;
        // $product->save();
        

        
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

    public function viewDollShoes()
    {
        $doll_shoes = Product::where('sc_id', 3)->where('is_active', 1)->get();
        return view('product.doll-shoes', compact('doll_shoes'));
    }

    public function viewMules()
    {
        $mules = Product::where('sc_id', 4)->where('is_active', 1)->get();
        return view('product.mules', compact('mules'));
    }

    public function viewHalfInch()
    {
        $half_inch = Product::where('sc_id', 2)->where('is_active', 1)->get();
        return view('product.half-inch', compact('half-inch'));
    }

    public function viewTwoInches()
    {
        $two_inches = Product::where('sc_id', 1)->where('is_active', 1)->get();
        return view('product.two-inches', compact('two_inches'));
    }

    public function viewBirks()
    {
        $birks = Product::where('sc_id', 5)->where('is_active', 1)->get();
        return view('product.birks', compact('birks'));
    }
}
