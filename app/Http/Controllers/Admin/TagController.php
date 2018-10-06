<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = tag::all();
        return view('admin.tag.show' , compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.tag');
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
        $tag = new tag();
        $tag->name = $request->name ;
        $tag->slug = $request->slug ;
        if ($tag->save()){
            return redirect(route('tag.index'))->with('success', 'Tag Added!');
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
        $tag = tag::where('id' , $id)->first();
        if ($tag){
            return view('admin.tag.edit' ,compact('tag'));
        }
        return redirect(route('tag.index'))->with('error_msg', 'Tag Not Found!');
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
        $tag = tag::find($id);
        $tag->name = $request->name ;
        $tag->slug = $request->slug ;
        if ($tag->save()){
            return redirect(route('tag.index'))->with('success', 'Tag Edited!');
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
        $tag =  tag::where('id' ,$id) ;
        if ($tag->delete()){
            return redirect(route('tag.index'))->with('success', 'Tag Deleted!');
        }
        return redirect(route('tag.index'))->with('error_msg', 'Tag Not Found!');

    }
}
