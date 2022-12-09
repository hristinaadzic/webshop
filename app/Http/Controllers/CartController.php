<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($productId){
       // dd(session()->get('cartItems'));
        //session()->remove('cartItems');
        $product = Product::with('prices')->findOrFail($productId);

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
            array_push($cartItems, $cartItem);
        }
        session()->put('cartItems', $cartItems);

        return response()->json([], 200);
    }

    public function index(){
        return view('pages.cart');
    }
}
