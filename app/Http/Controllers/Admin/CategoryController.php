<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = category::all();
        return view('admin.category.show' , compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required',
            'slug' => 'required'
        ]);
        $category = new category();
        $category->name = $request->name ;
        $category->slug = $request->slug ;
        if ($category->save()){
            return redirect(route('category.index'))->with('success', 'Category Added!');
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
        $cat = category::where('id' , $id)->first();
        if ($cat){
            return view('admin.category.edit' ,compact('cat'));
        }
        return redirect(route('category.index'))->with('error_msg', 'Category Not Found!');
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
        $this->validate($request , [
            'name' => 'required',
            'slug' => 'required'
        ]);
        $cat = category::find($id);
        $cat->name = $request->name ;
        $cat->slug = $request->slug ;
        if ($cat->save()){
            return redirect(route('category.index'))->with('success', 'Category Edited!');
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
        $cat =  category::where('id' ,$id) ;
        if ($cat->delete()){
            return redirect(route('category.index'))->with('success', 'Category Deleted!');
        }
        return redirect(route('category.index'))->with('error_msg', 'Tag Not Found!');

    }
}
