<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(5);
        return view('show.posts.post_index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('show.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            //only img filetypes, optional to have image, max size of 2mb
            //might have to change web server settings as well to alter max file size
            'image'=> 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if($request->hasFile('image')){
            //get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('image')->storeAs('public/images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }


        //Create Post
        $post = new Post;
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->user_id = auth()->user()->id;
        $post->image=$fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id); 
        return view('show.posts.show_post')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        //Check for correct user
        if(auth()->user()->id!==$post->user_id){
            return redirect('/posts')->with('error','Unauthorized Page');
        }
        return view('show.posts.edit')->with('post',$post);
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
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);

        //Handle File Upload
        if($request->hasFile('image')){
            //deletes old image if there is an original image
            $post= Post::find($id);
            if($post->image!='noimage.jpg'){
                Storage::delete('public/images/'.$post->image);
            }
            //get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('image')->storeAs('public/images',$fileNameToStore);
        }

        //Create Post
        $post = Post::find($id);
        if (auth()->user()->id!==$post->user_id){
            return redirect('/posts')->with('error','Unauthorized Page');
        }
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->user_id = auth()->user()->id;
        if($request->hasFile('image')){
            $post->image=$fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //check for correct user
        if (auth()->user()->id!==$post->user_id){
            return redirect('/posts')->with('error','Unauthorized Page');
        }

        if($post->image!= "noimage.jpg"){
            //Delete Image
            Storage::delete('public/images/'.$post->image);
        }
        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
}
