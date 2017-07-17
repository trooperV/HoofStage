<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class BlogController extends Controller
{
	public function getIndex(){

		$posts = Post::orderBy('id', 'desc')->paginate(4);
		$users = User::all();

		return view('blog.index')->with('posts', $posts)->with('users', $users);
	}

    public function getSingle($slug){
    	$post = Post::where('slug', '=', $slug)->first();
    	$users = User::all();

    	return view('blog.single')->with('post', $post)->with('users', $users);
    }
}
