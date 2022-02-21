<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;

class PostsController extends Controller
{
    private $model = null;
    public function __construct(Post $model)
    {
        $this->middleware('auth')->except('logout');
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'user_id'=>'required|string',
            'title'=>'required|string',
            'content'=>'required|string',
        ]);

        try{
            $posts = $this->model->create([
                'user_id'=> $request->user_id,
                'title'=> $request->title,
                'content'=> $request->content,
            ]);

        $posts = $this->model->with('user')->find($request->user_id)->get();
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
        return back()->with(['success'=>'Successfully created a post', 'posts'=>$posts]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        try{
            $posts = $this->model->where('user_id', $id)->get();
        }catch(Exception $e){
            return back()->withErrors('Whooppss, no post created yet!');
        }
        return view('posts.posts')->with('posts',$posts); 
    }

    public function edit_post($id){
        $post = $this->model->find($id);
        return view('posts.edit')->with('post', $post);
    }

    public function delete_post($id){
        $post = $this->model->find($id);
        return view('posts.delete')->with('post', $post);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'title'=>'sometimes|string',
            'content'=>'sometimes|string',
        ]);

        try{
            $post = $this->model->find($request->post_id);
            $post->update([
                'title'=> $request->title,
                'content'=> $request->content,
            ]);
        }catch(Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
        return response()->json(['success'=>'Successfully update a post.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            $post = $this->model->find($request->post_id);
            $post->delete();
        }catch(Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
        return response()->json(['success'=>'Successfully deleted a post.']);
    }
}
