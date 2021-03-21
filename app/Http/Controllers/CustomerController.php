<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;

class CustomerController extends Controller
{
    public function dashboard()
    {
        $product = Product::where(['status' => '0'])->paginate(5);
        return view('customer_dashboard', compact('product'));
    }
}
