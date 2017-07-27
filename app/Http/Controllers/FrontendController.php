<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Post;
use App\Category;
use App\Tag;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = Setting::first()->site_name;
        $categories =Category::take(5)->get();
        $first_post = Post::orderBy('created_at', 'desc')->first();
        $second_post = Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first();
        $third_post = Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first();
        $Architecture = Category::find(1);
        $Psychology = Category::find(2);
        $settings = Setting::first();
        
        return view('index', compact('title', 'categories', 'first_post', 'second_post','third_post', 'Architecture', 'Psychology','settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function singlePost($slug)
    {
        //
        $post = Post::where('slug', $slug)->first();
        $post_title = $post->title;
        $categories = Category::take(5)->get();
        $settings = Setting::first();
        $title = Setting::first()->site_name;
        $next_id = Post::where('id', '>', $post->id)->min('id');
        $prev_id = Post::where('id', '<', $post->id)->max('id');
        $next_post = Post::find($next_id);
        $prev_post = Post::find($prev_id);
        $tags = Tag::all();

        return view('single', compact('post', 'post_title', 'categories', 'settings','title', 'next_post','prev_post','tags'));
    }
    
    
      public function category($id)
    {
        //
        $category = Category::find($id);
        $cat_title = $category->category_name;
        $categories = Category::take(5)->get();
        $settings = Setting::first();
        $title = Setting::first()->site_name;
        
        return view('category', compact('category','categories', 'settings','cat_title', 'title'));
    }
    
      public function Tag($id){
        //
        $tag = Tag::find($id);
        $tag_title = $tag->tag_name;
        $categories = Category::take(5)->get();
        $settings = Setting::first();
        $title = Setting::first()->site_name;
        
        return view('tag', compact('tag','categories', 'settings','tag_title', 'title'));
    }
    
    
    public function Search(){
        //
        //$tag = Tag::find($id);
        $search_title = 'Seach Results : '. request('query');
        $categories = Category::take(5)->get();
        $settings = Setting::first();
        $title = Setting::first()->site_name;
        $posts = Post::where('Post_title','like', '%'. request('query'). '%')->get();
        
        return view('results', compact('categories', 'settings','search_title', 'title', 'posts'));
    }
    
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
