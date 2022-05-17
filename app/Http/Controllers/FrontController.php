<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class FrontController extends Controller
{
    function index(){

        $posts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->take(5)->get();
        $firstposts = $posts->splice(0, 2);
        $middlepost = $posts->splice(0, 1);
        $lastposts = $posts->splice(0);

        $recentPosts = Post::orderby('created_at', 'DESC')->paginate(9);

        $posts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->take(5)->get();

        return view('layouts.index', compact(array('posts', 'recentPosts', 'firstposts', 'middlepost', 'lastposts')));

    }

    function singlepost($slug){
        $post = Post::where('slug', $slug)->first();

        if($post){
            return view('layouts.post', compact('post'));
        }else{
            return 'No Blog post found';
        }
        

    }
}
