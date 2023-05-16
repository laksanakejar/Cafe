<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\product;

class BeliController extends Controller
{
    public function shop($id)
    {
        $shop=Product::where('id',$id)->first();
        return view('dashboard.product', compact('shop'));
    }

    // public function addToshop($id)
    // {
    //     $product = Product::findOrFail($id);
      
    //     $cart = session()->get('cart', []);

    //     if(isset($cart[$id])) {
    //         $cart[$id]['quantity']++;
    //     }  else {
    //         $cart[$id] = [
    //             "name" => $product->name,
    //             "image" => $product->image,
    //             "price" => $product->price,
    //             "quantity" => 1
    //         ];
    //     }

    //     session()->put('cart', $cart);
    //     return redirect()->back()->with('success', 'Product add to cart successfully!');
    // }

}
