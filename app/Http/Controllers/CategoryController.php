<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('id','desc')->get();
        return view ('category.index',compact('category'));
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
        request()->validate([
            'category_name' => 'required'
        ]);
    
        if($files=$request->file('category_photo')){
                    
            $name=$files->getClientOriginalName();
            $files->move('category_photo',$name);
            //$images[]=$name;

            
    }

        Category::create([
            'category_name' => $request->category_name,
            'category_photo' => $name
        ]);
    

        alert()->success('Success',' Category created successfully!')->autoClose(8000);

        return redirect()->route('categories.index');
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
        request()->validate([
            'category_name' => 'required',
            ]);

            if($files=$request->file('category_photo')){
                    
                $name=$files->getClientOriginalName();
                $files->move('category_photo',$name);
                //$images[]=$name;
    
                $category = Category::findOrFail($id);
                $category->category_name = $request->category_name;
                $category->category_photo = $name;
                $category->save();
                
            }else{
                $category = Category::findOrFail($id);
                $category->category_name = $request->category_name;
                $category->save();
            }

       
       
      

        alert()->success('Success',' Category updated successfully!')->autoClose(5000);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = Category::findOrFail($id);
        $find->delete();


        
        alert()->success('Success',' Category deleted successfully!')->autoClose(8000);

        return redirect()->route('categories.index');
    }
}
