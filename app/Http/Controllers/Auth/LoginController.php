<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\ActivityLog;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   protected $redirectTo = '/administrator/dashboard';

   

//    protected function authenticated(Request $request, $user)
//     {
//         $role = Auth::user()->role->name;
//         switch ($role) {
//             case 'administrator':
//                     return redirect('/administrator/dashboard');
//                 break;
//             case 'user':
//                     return redirect('/users/dashboard');
//                 break;
//             default:
//                     return redirect('/login');
//                 break;
//         }
//     }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
