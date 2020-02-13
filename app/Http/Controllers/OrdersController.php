<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\ActivityLog;
use App\Notification;
use App\NotificationStatus;
use App\User;

class OrdersController extends Controller
{
    public function reservedOrders()
    {
        $reserved_orders = Order::where('is_active', 1)->where('status', 1)->get();
        return view('orders.reserved-orders', compact('reserved_orders'));
    }

    public function soldOrders()
    {
        $sold_orders = Order::where('is_active', 1)->where('status', 2)->get();
        return view('orders.sold-orders', compact('sold_orders'));
    }

    public function placeOrders($uid)
    {
        $item = Product::where('uid', $uid)->first();
        return view('orders.place-order', compact('item'));
    }

    public function checkoutOrders(Request $request, $uid)
    {
        $product = Product::where('uid', $uid)->first();

        $validatorrr = Validator::make($request->all(), [
            'quantity' => 'required',
            'customer_name' => 'required'
        ]);

        if($request->quantity > $product->stock){
            return redirect()->back()->withInput()->with('error', 'Quantiy must be less than Available Stock!');
        }

        if ($validatorrr->fails()) {
            return redirect()->back()->withInput()->with('error', $validatorrr->messages());
        }

        $user_id = Auth::user()->id;

        Order::create([
            'uid' => \Str::uuid(),
            'user_id' => $user_id,
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'customer_name' => $request->customer_name,
            'address' => $request->address,
            'contact_details' => $request->contact_details,
            'note' => $request->note
        ]);
        
        $stock = $product->stock - $request->quantity;

        $product->update([
            'stock' => $stock
        ]);

        ActivityLog::create([
            'uid' => \Str::uuid(),
            'user_id' => $user_id,
            'action' => 'Place Order for "' . ucwords($product->name) . '(' .$product->code . ')" - Size: ' .$product->size .' - Quantity: '.$request->quantity .' - Customer Name: ' . ucwords($request->customer_name)
        ]);

       $notif = Notification::create([
            'uid' => \Str::uuid(),
            'title' => 'Place Order',
            'message' => 'Place Order for "' . ucwords($product->name) . '(' .$product->code . ')" - Size: ' .$product->size .' - Quantity: '.$request->quantity .' - Customer Name: ' . ucwords($request->customer_name)
            ]);
    
        $users = User::where('is_active', 1)->get();
        foreach ($users as $user){
            NotificationStatus::create([
                'uid' => \Str::uuid(),
                'notif_id' => $notif->id,
                'user_id' => $user->id
            ]);
        }

        return redirect()->route('admin.reserved-orders')->with('success', 'Successfully Placed Order!');
    }

    public function updatePlaceOrders(Request $request)
    {

        $item = Order::where('uid', $request->uid)->first();
        $product = Product::where('uid', $request->product_uid)->first();
        $validatorrr = Validator::make($request->all(), [
            'quantity' => 'required|numeric|min:1',
            'customer_name' => 'required'
        ]);
        
        if ($validatorrr->fails()) {
            return redirect()->back()->withInput()->with('error', $validatorrr->messages());
        }
        $old_q = $item->quantity;

        if($item->quantity != $request->quantity){
            $oq = $item->quantity;
            $nq = $request->quantity;
            $ps = $product->stock;
            if($nq > $oq){
                $stock = $nq - $oq;
                $ps = $ps - $stock;
                if ($ps < 0) {
                    return redirect()->back()->withInput()->with('error', 'Quantiy must be less than Available Stock!');
                }
            } else {
                $stock = $oq - $nq;
                $ps = $ps + $stock;
            }
            $product->update([
            'stock' => $ps
        ]);
        }

        $item->update([
            'quantity' => $request->quantity,
            'customer_name' => $request->customer_name,
            'address' => $request->address,
            'contact_details' => $request->contact_details,
            'note' => $request->note
        ]);



        if($old_q != $request->quantity){
            ActivityLog::create([
                'uid' => \Str::uuid(),
                'user_id' => Auth::user()->id,
                'action' => 'Update Order Quantity for "' . ucwords($product->name) . '(' .$product->code. ')" From ' . $old_q . ' To '. $request->quantity
            ]);
    
           $notif = Notification::create([
                'uid' => \Str::uuid(),
                'title' => 'Update Order Quantity',
                'message' => 'Update Order Quantity for "' . ucwords($product->name) . '(' .$product->code. ')" From ' . $old_q . ' To '. $request->quantity
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

        return redirect()->back()->with('success', 'Successfully Update Order!');
 

    }

    public function soldItems($uid)
    {
        $item = Order::where('uid', $uid)->first();
        $item->update([
            'status' => 2
        ]);

        ActivityLog::create([
            'uid' => \Str::uuid(),
            'user_id' => Auth::user()->id,
            'action' => 'Sold "' . ucwords($item->product->name) . '(' .$product->code. ')" To ' . ucwords($item->customer_name)
        ]);

       $notif = Notification::create([
            'uid' => \Str::uuid(),
            'title' => 'Sold Order',
            'message' => 'Sold "' . ucwords($item->product->name) . '(' .$product->code. ')" To ' . ucwords($item->customer_name)
        ]);

        $users = User::where('is_active', 1)->get();
        foreach ($users as $user){
            NotificationStatus::create([
                'uid' => \Str::uuid(),
                'notif_id' => $notif->id,
                'user_id' => $user->id
            ]);
        }

        return redirect()->route('admin.sold-orders')->with('success', 'Nicely done!');
    }

    public function unsoldItems($uid)
    {
        $item = Order::where('uid', $uid)->first();
        $item->update([
            'status' => 1
        ]);

        ActivityLog::create([
            'uid' => \Str::uuid(),
            'user_id' => Auth::user()->id,
            'action' => 'Place Back to Reserved Orders (Unsold) "' . ucwords($item->product->name) . '(' . ucwords($item->product->name) . ')"'
        ]);

       $notif = Notification::create([
            'uid' => \Str::uuid(),
            'title' => 'Unsold Order',
            'message' => 'Place Back to Reserved Orders (Unsold) "' . ucwords($item->product->name) . '(' . ucwords($item->product->name) . ')"'
        ]);

        $users = User::where('is_active', 1)->get();
        foreach ($users as $user){
            NotificationStatus::create([
                'uid' => \Str::uuid(),
                'notif_id' => $notif->id,
                'user_id' => $user->id
            ]);
        }

        return redirect()->route('admin.reserved-orders')->with('success', 'Successfully back on your Reserved Orders');
    }

    public function cancelReservedOrders($uid)
    {
        $item = Order::where('uid', $uid)->first();
        $product = Product::where('id', $item->product_id)->first();

        $stock = $item->quantity + $product->stock;
        
        $item->update([
            'status' => 3
        ]);

        $product->update([
            'stock' => $stock
        ]);

        ActivityLog::create([
            'uid' => \Str::uuid(),
            'user_id' => Auth::user()->id,
            'action' => 'Cancel Order - "' . ucwords($product->name) . '(' . $product->code . ')" - Customer Name: '.ucwords($item->customer_name)
        ]);

       $notif = Notification::create([
            'uid' => \Str::uuid(),
            'title' => 'Cancel Order',
            'message' => '"'. ucwords($product->name) . '(' . $product->code . ')" - Customer Name: '.ucwords($item->customer_name)
        ]);

        $users = User::where('is_active', 1)->get();
        foreach ($users as $user){
            NotificationStatus::create([
                'uid' => \Str::uuid(),
                'notif_id' => $notif->id,
                'user_id' => $user->id
            ]);
        }

        return redirect()->route('admin.reserved-orders')->with('success', 'Successfully Cancelled Order!');
    }
}
