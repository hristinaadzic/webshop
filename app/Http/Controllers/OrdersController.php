<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLine;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cartItems = session()->get('cartItems');
        $order = new Order();
        $order->userId = session()->get('user')->id;
        $total = 0;
        foreach ($cartItems as $item){
            $line = new OrderLine();
            $line->productName = $item->product->name;
            $line->quantity = $item->quantity;
            $line->price = $item->price->priceValue;
            $line->isDeleted = false;
            $lines[] = $line;
            $total += intval($line->quantity) * intval($item->price->priceValue);
        }

        $order->total = $total;
        try{

            \DB::beginTransaction();

            $order->save();

            foreach($lines as $l) {
                $l->orderId = $order->id;
                $l->save();
            }
            \DB::commit();

            session()->remove("cartItems");
            return redirect()->route('cart')->with('success', 'Order succesfull');
        }
        catch (\Exception $ex){
            \DB::rollback();
            dd($ex->getMessage());
            return redirect()->route('cart')->with('error', 'We could not complete your order');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
