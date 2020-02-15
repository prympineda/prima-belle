<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use App\ShoeCategory;
use App\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\ActivityLog;
use App\Notification;
use App\NotificationStatus;
use App\User;
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
            'sc_id' => 'required',
            'stock' => 'required|numeric|min:0',
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

        ActivityLog::create([
            'uid' => \Str::uuid(),
            'user_id' => Auth::user()->id,
            'action' => 'Add Product - "' . ucwords($request->name) . ' (' .$request->code. ')"'
        ]);

       $notif = Notification::create([
            'uid' => \Str::uuid(),
            'title' => 'Add Product - ',
            'message' => 'Add Product - "' . ucwords($request->name) . ' (' .$request->code. ')"'
        ]);

        $users = User::where('is_active', 1)->get();
        foreach ($users as $user){
            NotificationStatus::create([
                'uid' => \Str::uuid(),
                'notif_id' => $notif->id,
                'user_id' => $user->id
            ]);
        }
        
        return redirect()->back()->with('success', 'Successfully Added Product');
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
    public function edit($uid)
    {
        $product = Product::where('uid', $uid)->first();
        $shoe_cats = ShoeCategory::where('is_active', 1)->get();
        return view ('product.edit-product', compact('product', 'shoe_cats'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {

        $product = Product::where('uid', $request->uid)->first();
        $validatorrr = Validator::make($request->all(), [
            'code' => 'required',
            'name' => 'required',
            'sc_id' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric|min:0',
            'size' => 'required|numeric|min:0'
        ]);

        if ($validatorrr->fails()) {
            return redirect()->back()->withInput()->with('error', $validatorrr->messages());
        }

        if($product->code != $request->code){
            $email_check = User::where('email', $request->email)->first();

            if ($email_check == True) {
                return redirect()->back()->withInput()->with('error', 'Code already in use.');
            }
        }

        $old_s = $product->stock;
       
       $product->update([
            'code' => strtoupper($request->code),
            'name' => $request->name,
            'sc_id' => $request->sc_id,
            'size' => $request->size,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'stock' => $request->stock,
            'ribbon_tag' => $request->ribbon_tag,
            'is_sale' => $request->is_sale
        ]);

        if ($request->photo_name != null){
            $file = $request->file('photo_name');
            $name = time() . $file->getClientOriginalName();
            $product->update([
                'photo_name' => $name
            ]);
            $file->move(public_path('images'), $name);
        }      

        if($old_s != $request->stock){
            ActivityLog::create([
                'uid' => \Str::uuid(),
                'user_id' => Auth::user()->id,
                'action' => 'Update Product Stock for "' . ucwords($product->name) . '(' .$product->code. ')" From ' . $old_s . ' To '. $request->stock
            ]);
    
           $notif = Notification::create([
                'uid' => \Str::uuid(),
                'title' => 'Update Product Stock',
                'message' => 'Update Order Stock for "' . ucwords($product->name) . '(' .$product->code. ')" From ' . $old_s . ' To '. $request->stock
            ]);
    
            $users = User::where('is_active', 1)->get();
            foreach ($users as $user){
                NotificationStatus::create([
                    'uid' => \Str::uuid(),
                    'notif_id' => $notif->id,
                    'user_id' => $user->id
                ]);
            }
        }
        
        return redirect()->back()->with('success', 'Successfuly Update Product!');
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

    public function viewAllProducts()
    {
        $all_products = Product::where('is_active', 1)->orderBy('created_at', 'desc')->get();
        return view('product.all-products', compact('all_products'));
    }

    public function viewMules()
    {
        $mules = Product::where('sc_id', 4)->where('is_active', 1)->get();
        return view('product.mules', compact('mules'));
    }

    public function viewHalfInch()
    {
        $half_inch = Product::where('sc_id', 2)->where('is_active', 1)->get();
        return view('product.half-inch', compact('half_inch'));
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

    public function viewSwenSoleDollShoes()
    {
        $ssd = Product::where('sc_id', 6)->where('is_active', 1)->get();
        return view('product.view-swen-sole-doll-shoes', compact('ssd'));
    }
}
