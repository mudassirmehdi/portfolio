<?php

namespace App\Http\Controllers; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Session;
use Auth;
use Validator; 
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('backend.pages.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation =  Validator::make($request->all(),[
          'post_title' => 'required',      
          'ckeditor' => 'required',      
          'post_thumbail' => 'required'     
        ]);

        if($validation->fails()){
           return redirect()->back()->with('error',$validation->Errors()->first())->withInput()->withErrors($validation);
        }

        $post = new Post(); 
        if ($request->has('post_thumbail'))
        {
            $file = $request->file('post_thumbail');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . rand(99, 99) . '.' . $extention;
            $file->move('uploads/posts/', $fileName);
        }
        $post->user_id = Auth::user()->id;
        $post->post_title = $request->post_title; 
        $post->post_description = $request->ckeditor; 
        $post->post_thumbail = $request->post_thumbail;
        $post->post_thumbail = $fileName; 
        $post->post_tags = $request->post_tags;
        $post->post_categories = $request->post_categories;


        $post->save();
        if ($post->save()) {
            Session::flash('message', 'Post Publish Successfully');
           return redirect()->route('posts');
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
        $post = Post::findOrFail($id);
        return view('backend.pages.posts.edit', compact('post'));
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
        $validation =  Validator::make($request->all(),[
          'post_title' => 'required',      
          'ckeditor' => 'required',      
          'post_thumbail' => 'required'     
        ]);

        if($validation->fails()){
           return redirect()->back()->with('error',$validation->Errors()->first())->withInput()->withErrors($validation);
        }

        $post =  Post::findOrFail($id);
        if (!empty($post->post_thumbail)) {
                    unlink(public_path('uploads/posts/' . $post->post_thumbail));
                }  
        if ($request->has('post_thumbail'))
        {
            $file = $request->file('post_thumbail');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . rand(99, 99) . '.' . $extention;
            $file->move('uploads/posts/', $fileName);
        }
        $post->user_id = Auth::user()->id;
        $post->post_title = $request->post_title; 
        $post->post_description = $request->ckeditor; 
        $post->post_thumbail = $request->post_thumbail;
        $post->post_thumbail = $fileName; 
        $post->post_tags = $request->post_tags;
        $post->post_categories = $request->post_categories;


        $post->update();
        if ($post->update()) {
            Session::flash('message', 'Post Update Successfully');
           return redirect()->back();
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
        $post = post::findOrFail($id);
       if (!empty($post->post_thumbail)) {
                    unlink(public_path('uploads/posts/' . $post->post_thumbail));
                }  
       if ($post->delete()) {
                    Session::flash('message', 'Post deleted Successfully');
                   return redirect()->back();
        }
    }
}
