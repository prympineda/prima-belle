<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityLog;
use App\Product;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(){

        $reserved_items = Order::where('status', 1)->get();
        $res_i = 0;
        foreach($reserved_items as $ri){
            $res_i = $res_i + $ri->quantity;
        };

        $sold_items = Order::where('status', 2)->get();
        $sold_i = 0;
        foreach($sold_items as $sold){
            $sold_i = $sold_i + $sold->quantity;
        };

        $products = Product::where('is_active', 1)->get();
        $prod = 0;
        foreach($products as $p){
            $prod = $prod + $p->stock;
        };

        $all = $res_i + $sold_i + $prod;

        
        return view ('admin.admin-dashboard', compact('res_i', 'sold_i', 'prod', 'all'));
    }

    public function getActivityLogs()
    {

        if(Auth::user()->role_id == 1){
            $activity_logs = ActivityLog::where('status', 1)->orderBy('created_at', 'desc')->get();
        } else {
            $activity_logs = ActivityLog::where('status', 1)->where('for_admin', 0)->orderBy('created_at', 'desc')->get();
        }
       
        return view('admin.activity-logs', compact('activity_logs')); 
    }

    public function changePassword()
    {
        return view('admin.change-password');
    }

    public function saveChangePassword(Request $request)
    {

        $validatorrr = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'new_confirm_password' => 'same:new_password',
        ]);

        if ($validatorrr->fails()) {
            return redirect()->back()->withInput()->with('error', $validatorrr->messages());
        }

        if(Auth::user()->password != $request->current_password){
            return redirect()->back()->with('error', "Password Doesn't Match");
        }

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        ActivityLog::create([
            'uid' => \Str::uuid(),
            'user_id' => Auth::user()->id,
            'action' => 'Changed Password',
            'for_admin' => 1
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Successfully Update Password!');
    }
}
