<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
  

class CafeController extends Controller
{

    public function keranjang()
    {
        return view ('dashboard.product');
    }

    public function pesanan ($id)
    {
        $keranjang= Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "name" => $keranjang->name,
                "image" => $keranjang->image,
                "price" => $keranjang->price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }


    public function produk ()
    {
        $products= Product:: all();
        return view ('dashboard.menu', compact('products'));
    }

    public function cart()
    {
        return view('dashboard.cart');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
      
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "name" => $product->name,
                "image" => $product->image,
                "price" => $product->price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }


    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }
    
    public function checkout(Request $request){
       
        $id_product = $request->id_product;
        $total_pesanan = $request->total_pesanan;
        $totalPrice = $request->totalPrice;
 
            for($i=0;$i<count((array)$id_product);$i++){
                Order::create([
                    'id_product' => $id_product[$i],
                    'total_pesanan' => $total_pesanan[$i],
                    'totalPrice' => $totalPrice[$i]
                ]);

                $product = Product::where('id_product','=',$id_product)->first();
                $total = $product->array['stok']-$total_pesanan[$i];
                $product->update([
                    'stok' => $total[$i],
                ]);
            }
            
            $request->session()->forget('cart');

            return redirect('/Produk');

        }


        public function shop($id)
    {
        $shop=Product::where('id',$id)->first();
        // if(isset($shop)) {
        //     $shop = [
        //         'quantity' => 1
        //     ];
        // }
        return view('dashboard.product', compact('shop'));
    }
    
    public function updateShop(Request $request)
    {
        $shop=Product::where('id',$id)->first();

        if($request->id && $request->quantity){
            $update = session()->get($shop);
            $update[$request->id]["quantity"] = $request->quantity;
            session()->put('update', $update);
            session()->flash('success', 'Shop successfully updated!');
        }
    }
}
?>
