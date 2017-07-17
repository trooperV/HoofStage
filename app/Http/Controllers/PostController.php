<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Tag;
use App\Post;
use Session;
use Image;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(9);

        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request);
        //validation
        $this -> validate($request, array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'body' => 'required'
            ));

        //if validation is successful
        //store in the database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->user_id = $request->user_id;
        $post->category_id = $request->category_id;
        $post->body = $request->body;

        if ($request->hasfile('featured_image')){  
            $image = $request->file('featured_image');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
                $post->image = $filename;               
        }

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'The post was successfully saved!');

        return redirect()->route('posts.show', $post->id);
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
        return view('posts.show')->with('post', $post); 
        //                       ->withPost($post);
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
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        return view('posts.edit')->with('post', $post)->with('categories', $cats)->with('tags', $tags2);
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



      $this -> validate($request, array(
        'title' => 'required|max:255',
        'slug' => 'required|alpha_dash|max:255|unique:posts,slug,'.$id,
        'category_id' => 'required|integer',
        'body' => 'required'
        ));

      $post = Post::find($id);
      $post->title = $request->input('title');
      $post->slug = $request->input('slug');
      $post->category_id = $request->input('category_id');
      $post->body = $request->input('body');

      $post->save();

      if(isset($request->tags)){
            $post->tags()->sync($request->tags);
      }else{
            $post->tags()->sync(array());
      }
      

      Session::flash('success', 'This post was successfully saved!');

      return redirect()->route('posts.show', $post->id);
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
        $post->tags()->detach();
        $post->delete();
        
        Session::flash('success', 'The '. $post->id. 'th post was successfully deleted!');

        return redirect()->route('posts.index');
    }
}
