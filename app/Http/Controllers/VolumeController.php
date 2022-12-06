<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Volume;
use Illuminate\Http\Request;

class VolumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['volumes'] = Volume::orderBy('volumeInMillilitres')->get();
        return view('admin.pages.volumes', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create-volume');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $volumeMills = $request->input('volume');

        $request->validate([
            'volume' => 'bail|required|unique:volumes,volumeInMillilitres'
        ]);

        try{
            $volume = new Volume();
            $volume->volumeInMillilitres = $volumeMills;
            $volume->save();
            return redirect()->route('categories.create')->with('success', 'Volume was added');
        }catch(\Exception $ex){
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
        $this->data['volume'] = Volume::find($id);
        return view('admin.pages.create-volume', $this->data);
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
        $volumeMills = $request->input('volume');

        $request->validate([
            'volume' => 'bail|required|unique:volumes,volumeInMillilitres'
        ]);

        try{
            $volume = Volume::find($id);
            $volume->volumeInMillilitres = $volumeMills;
            $volume->save();
            return redirect()->route('volumes.create')->with('success', 'Volume was updated');
        }catch(\Exception $ex){
            return redirect()->route('volumes.create')->with('error', 'There was an error processing your request');
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
            $volume = Volume::find($id);

            if(!$volume->isDeleted){
                $volume->isDeleted = true;
            }
            else{
                $volume->isDeleted = false;
            }

            $volume->save();
            return redirect()->route('admin-volumes')->with('success', 'Volume status was changed');
        }catch(\Exception $ex){
            dd($ex->getMessage());
            return redirect()->route('admin-volumes')->with('error', 'There was an error processing your request');

        }
    }
}
