<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = Category::get();
        return  view('admin.pages.categories', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.pages.create-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoryName = $request->input('categoryName');

        $request->validate([
            'categoryName' => 'bail|required|unique:categories,name'
        ]);

        try{

            $category = new Category();
            $category->name = $categoryName;
            //dd($category);
            $category->save();

            return redirect()->route('categories.create')->with('success', 'Category was added');
        }
        catch(\Exception $ex){
            return redirect()->route('categories.create')->with('error', 'There was an error processing your request');
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
        $this->data['category'] = Category::find($id);
        return view('admin.pages.create-category', $this->data);
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
        $categoryName = $request->input('categoryName');

        $request->validate([
            'categoryName' => 'bail|required|unique:categories,name'
        ]);

        try{

            $category = Category::find($id);
            $category->name = $categoryName;
            $category->save();

            return redirect()->route('categories.create')->with('success', 'Category was updated');
        }
        catch(\Exception $ex){
            return redirect()->route('categories.create')->with('error', 'There was an error processing your request');
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
            $category = Category::find($id);

            if(!$category->isDeleted){
                $category->isDeleted = true;
            }
            else{
                $category->isDeleted = false;
            }

            $category->save();
            return redirect()->route('admin-categories')->with('success', 'Category status was changed');
        }catch(\Exception $ex){
            dd($ex->getMessage());
            return redirect()->route('admin-categories')->with('error', 'There was an error processing your request');

        }
    }
}
