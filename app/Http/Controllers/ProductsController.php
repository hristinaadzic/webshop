<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Product;
use App\Models\ProductModel;
use App\Models\Volume;
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

    public function adminIndex(){
        $products = Product::with('brands', 'categories', 'genders');
        $this->data["genders"] = Gender::get();
        $this->data["categories"] = Category::where("isDeleted", false)->get();
        $this->data["brands"] = Brand::get();

        $this->data["products"] = $products->get();
        return view("admin.pages.products", $this->data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::with('brands', 'categories');
        $this->data["genders"] = Gender::get();
        $this->data["volumes"] = Volume::get();
        $this->data["categories"] = Category::where("isDeleted", false)->get();
        $this->data["brands"] = Brand::get();
        $this->data["products"] = $products->get();
        return view('admin.pages.create-product', $this->data);
        return view('admin.pages.create-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('productName');
        $description = $request->input('description');
        $brandId = $request->input('brand');
        $genderId = $request->input('gender');
        $categoryIds = $request->input('categories');
        $volumeIds = $request->input('volumes');
        $image = $request->file('image');
        $imageName = time().$image->getClientOriginalName();
        $request->image->move(public_path('/assets/images'), $imageName);


        try{
            \DB::beginTransaction();
            $product = new Product();
            $product->name = $name;
            $product->description = $description;
            $product->image = $imageName;
            $product->brandId = $brandId;
            $product->genderId = $genderId;

            $product->save();
            $product->categories()->attach($categoryIds);
            $product->volumes()->attach($volumeIds);
            \DB::commit();
            return redirect()->route('products.create')->with('success', 'Product was added');
        }
        catch(\Exception $ex){
            \DB::rollback();
            dd($ex->getMessage());
            return redirect()->route('products.create')->with('error', 'There was an error processing your request');

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
        $this->data["genders"] = Gender::get();
        $this->data["volumes"] = Volume::get();
        $this->data["brands"] = Brand::get();
        $this->data['categories'] = Category::get();
        $this->data["product"] = Product::with('categories')->find($id);
        return view('admin.pages.create-product', $this->data);
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
        $name = $request->input('productName');
        $description = $request->input('description');
        $brandId = $request->input('brand');
        $genderId = $request->input('gender');
        $categoryIds = $request->input('categories');
        $volumeIds = $request->input('volumes');
        $image = $request->file('image');


        try{
            \DB::beginTransaction();
            $product = Product::find($id);
            $product->name = $name;
            $product->description = $description;
            $product->brandId = $brandId;
            $product->genderId = $genderId;

            if(isset($image)){
                $imageName = time().$image->getClientOriginalName();
                $request->image->move(public_path('/assets/images'), $imageName);
            }
            else{
                $imageName = $product->image;
            }

            $product->image = $imageName;
            $product->save();
            $product->categories()->sync($categoryIds);
            $product->volumes()->sync($volumeIds);
            foreach ($product->prices as $price){
                $product->volumes()->sync($price);
            }
            \DB::commit();
            return redirect()->route('products.create')->with('success', 'Product was updated');
        }
        catch(\Exception $ex){
            \DB::rollback();
            dd($ex->getMessage());
            return redirect()->route('products.create')->with('error', 'There was an error processing your request');

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
            $product = Product::find($id);

            if(!$product->isDeleted){
                $product->isDeleted = true;
            }
            else{
                $product->isDeleted = false;
            }

            $product->save();
            return redirect()->route('admin-products')->with('success', 'Product status was changed');
        }catch(\Exception $ex){
            dd($ex->getMessage());
            return redirect()->route('admin-products')->with('error', 'There was an error processing your request');

        }
    }
}
