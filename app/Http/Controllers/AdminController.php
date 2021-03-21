<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Product;
use Auth;
use Hash;
use Session;

class AdminController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    // store register user code here

    public function store_register_user(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
        ]);

        $data = $request->all();

        if($data['p_number'])
        {
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->lname = $data['lname'];
            $user->phone = $data['p_number'];
            $user->type = '1';
            $user->password = bcrypt($data['password']);

        }else{
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->lname = $data['lname'];
            $user->phone = $data['p_number'];
            $user->password = bcrypt($data['password']);


            }
       
        $user->save();

        return redirect('register')->with(
            'flash_message_success',
            'User: &nbsp;&nbsp;&nbsp;' .
                $request->name .
                '&nbsp;&nbsp;register successfully!'
        );
    }

    // authenticate user code goes here

    public function authenticate(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if ( Auth::attempt([
                    'name' => $data['username'],
                    'password' => $data['password']])) 
                {

                    $role = Auth::User()->type;

                    switch($role)
                    {
                        case "0":
                           return redirect('user-dashboard');
                        break;
                        case "1":
                           return redirect('customer-dashboard');
                        break;
   
                    }
               


            } else {
                return redirect('/')->with(
                    'flash_message_error',
                    'Invalid Credentials Entered!'
                );
            }
        }
       
    }

    // user dashboard code goes here

    public function dashboard()
    {
        $product_details = Product::all();
        return view('dashboard', compact('product_details'));
    }

    // admin logout code goes here

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(\URL::previous());
    }
}
