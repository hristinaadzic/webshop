<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Product;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        $products = Product::with('brands', 'categories')->where("isDeleted", false);
        $this->data["genders"] = Gender::get();
        $this->data["categories"] = Category::where("isDeleted", false)->get();
        $this->data["brands"] = Brand::get();

        if($request->keyword){
            $products = $products->where('products.name', 'like', '%'.$request->get('keyword').'%');
        }

        if($request->brands){
            $products->whereIn('products.brandId', $request->brands);
        }

        if($request->categories){
            $products->whereRelation('categories', 'categories.id', $request->categories);
        }

        if($request->sort){
            $products = $products->orderBy('products.name', $request->sort);
        }

        $this->data["products"] = $products->paginate(3);
        return view("pages.products", $this->data);
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
//        $name = $request->input('name');
//        $description = $request->input('desc');
//        $
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data["product"] = Product::find($id);
        return view('pages.product', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data["product"] = Product::find($id);
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
