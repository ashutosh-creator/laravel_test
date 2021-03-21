<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;

class ProductController extends Controller
{

    // store product data code goes here
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $product = new Product();
            $product->p_name = $data['pname'];
            $product->p_price = $data['price'];
            $product->p_discount = $data['discount_per'];
            $product->p_description = $data['desc'];

            // upload image
            $profile = $request->file('f_name');
            if ($request->hasFile('f_name')) {
                $profile->move(
                    'public/uploads/',
                    $profile->getClientoriginalName()
                );
            }
            $product->p_image = $profile->getClientoriginalName();

            $product->save();
            return redirect('user-dashboard')->with(
                'flash_message_success',
                'Product has been added successfully!!'
            );
        }
    }

    // product status goes here

    public function status(Request $request)
    {
       
        $id =  $request->input('id');
        $status = $request->input('status');

         return Product::where(['id'=> $id])->update(['status'=>$status]);
     
    }

    // product delete code goes here

    public function delete(Request $request)
    {
       $id = $request->input('id');
       return Product::where(['id'=> $id])->delete();

    }

    // get product details goes here

    public function get_details(Request $request)
    {
        $product_id = $request->input('id');

        $product_details =  Product::where('id',$product_id)->get();

        echo json_encode($product_details);

        
    }

    public function update_details(Request $request)
    {
        $data = $request->all();
        $update_product = Product::where('id',$data['p_id'])->update([
            'p_name'=> $data['pname'],
            'p_price'=>$data['price'],
            'p_discount'=>$data['discount_per'],
            'p_description'=>$data['desc'],

        ]);

        return redirect('user-dashboard')->with('flash_message_update',
        'Product has been updated successfully!!');
    }
}
