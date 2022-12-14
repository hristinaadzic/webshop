<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['brands'] = Brand::get();
        return  view('admin.pages.brands', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create-brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brandName = $request->input('brandName');

        $request->validate([
            'brandName' => 'bail|required|unique:brands,name'
        ]);

        try{

            $brand = new Brand();
            $brand->name = $brandName;
            $brand->save();

            return redirect()->route('brands.create')->with('success', 'Brand was added');
        }
        catch(\Exception $ex){
            return redirect()->route('brands.create')->with('error', 'There was an error processing your request');
           dd($ex->getMessage());
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
        $this->data['brand'] = Brand::find($id);
        return view('admin.pages.create-brand', $this->data);
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
        $brandName = $request->input('brandName');

        $request->validate([
            'brandName' => 'bail|required|unique:brands,name'
        ]);

        try{
            $brand = Brand::find($id);
            $brand->name = $brandName;
            $brand->save();

            return redirect()->route('brands.create')->with('success', 'Brand was updated');
        }
        catch(\Exception $ex){
            return redirect()->route('brands.create')->with('error', 'There was an error processing your request');
            dd($ex->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $brand = Brand::find($id);

            if(!$brand->isDeleted){
                $brand->isDeleted = true;
            }
            else{
                $brand->isDeleted = false;
            }

            $brand->save();
            return redirect()->route('admin-brands')->with('success', 'Brand status was changed');
        }catch(\Exception $ex){
            dd($ex->getMessage());
            return redirect()->route('admin-brands')->with('error', 'There was an error processing your request');

        }
    }
}
