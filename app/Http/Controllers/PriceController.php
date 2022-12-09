<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Product;
use App\Models\Volume;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products'] = Product::with('prices')->get();
        return view('admin.pages.prices', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->id;
        $this->data['product'] = Product::find($id);
        $products= Product::with('volumes')->get();
        $volumes = Volume::join('product_volumes', 'volumes.id', '=', 'product_volumes.volumeId')
            ->where('product_volumes.productId', $id)->get();
        $this->data['products'] = $products;

        if($request->ajax()){
            return response()->json($volumes);
        }
        return view('admin.pages.create-price',$this->data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $volumeId = $request->input('volume');
        $pricevalue = $request->input('price');

        $request->validate([
            'volume'=> 'required',
            'price'=> 'required'
        ]);

        try{
            $price = new Price();
            $price->productVolumeId = $volumeId;
            $price->priceValue = $pricevalue;
            $price->save();
            return redirect()->route('prices.create')->with('success', 'Price was added for selected product');
        }
        catch(\Exception $ex){
           //dd($ex->getMessage());
            return redirect()->route('prices.create')->with('error', 'There was an error processing your request');

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
