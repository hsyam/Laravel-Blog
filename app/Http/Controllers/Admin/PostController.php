<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        $trash = post::onlyTrashed()->get();
        return view('admin.post.show' , compact('posts' ,'trash'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.post');
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
            'title' => 'required' ,
            'subtitle' => 'required' ,
            'slug' => 'required' ,
            'image' => 'required' ,
            'body' => 'required' ,
        ]);
        $post = new post();
        $post->title = $request->title ;
        $post->subtitle = $request->subtitle ;
        $post->slug = $request->slug ;
        $post->image = $request->image ;
        $post->body = $request->body ;
        if ($post->save()){
            return redirect(route('post.index'))->with('success', 'Post Added!');
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
        return post::where('id' ,$id)->delete();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::withTrashed()->where('id' , $id)->first();
        if ($post){
            return view('admin.post.edit' ,compact('post'));
        }
        return redirect(route('post.index'))->with('error_msg', 'Post Not Found!');
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
            'title' => 'required' ,
            'subtitle' => 'required' ,
            'slug' => 'required' ,
            'image' => 'required' ,
            'body' => 'required' ,
        ]);
        $post = post::withTrashed()->find($id);
        $post->title = $request->title ;
        $post->subtitle = $request->subtitle ;
        $post->slug = $request->slug ;
        $post->image = $request->image ;
        $post->body = $request->body ;
        if ($post->save()){
            return redirect(route('post.index'))->with('success', 'Post Edited!');
        }

    }

    /**
     * Move to trash (Soft Delete)
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softdel($id){
        $post = post::where('id' , $id);
         if (count($post->get())){
             $post->delete();
             return redirect(route('post.index'))->with('success', 'Post Moved to Trash!');

         }
        return redirect(route('post.index'))->with('error_msg', 'Post Not Found');

    }

    /**
     * Restore Posts From trash
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id){
        $post = post::where('id' , $id)->onlyTrashed();
        if (count($post->get())){
            $post->restore();
            return redirect(route('post.index'))->with('success', 'Post Restored!');

        }
        return redirect(route('post.index'))->with('error_msg', 'Post Not Found');

    }

    /**
     * Remove Posts
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $post =  post::withTrashed()->where('id' ,$id) ;
        if ($post->forceDelete()){
            return redirect(route('post.index'))->with('success', 'Post Deleted!');
        }
        return redirect(route('post.index'))->with('error_msg', 'Post Not Found!');
    }

    /**
     * Return Json data for dataTable Jquery Plugin
     * Yajra Data Package
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPostDatatable(){
        return datatables(post::all())->toJson();
    }
    /**
     * Return Json data for dataTable Jquery Plugin
     * Yajra Data Package
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPostDatatableTrash(){

        return datatables(post::onlyTrashed()->get())->toJson();
    }
}
