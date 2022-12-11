<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request){
       // dd($request->all());
       // dd(session()->get('cartItems'));
        //session()->remove('cartItems');
        $productId = $request->input('productId');
        $volumeId = $request->input('volumes');
        $product = Product::with('prices')->findOrFail($productId);
        $price = Price::where('productVolumeId', $volumeId)->first();

        $cartItems = session()->get('cartItems');

        if(!$cartItems){
            $cartItems = [];
        }

        $existingIndex = null;

        foreach ($cartItems as $index => $item){
            if($item->product->id == $productId){
                $existingIndex = $index;
                break;
            }
        }

        if($existingIndex !== null){
            $cartItems[$existingIndex]->quantity++;
        }
        else{
            $cartItem = new \stdClass();
            $cartItem->quantity = 1;
            $cartItem->product = $product;
            $cartItem->price = $price;
            array_push($cartItems, $cartItem);
        }
        session()->put('cartItems', $cartItems);

        return redirect()->back()->with('success', 'Added to cart');
    }

    public function index(){
        return view('pages.cart');
    }
}
