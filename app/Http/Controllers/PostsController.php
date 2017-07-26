<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Session;
use App\Tag;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = tag::all();
        
        if($categories->count()==0 || $tags->count()==0)
        {
            Session::flash('error', 'There are no categories or tags listed. Please create a category/tag first.');
            return redirect()->back();
        }
        
        return view('admin.posts.create', compact('categories', 'tags'));
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
        
        
        $this->validate($request,[
            'postTitleInput' => 'required',
            'postContentInput' => 'required',
            'featuredImageInput' => 'required|image',
            'category_id' => 'required',
            'tags'=>'required',
        ]);
            
            //Saving the Image file. 
            $featured_img = $request->featuredImageInput;
            $featured_img_new_name = time().$featured_img->getClientOriginalName(); 
            //This above getClientOriginalName(); function is to retain the original file name uploaded by a client. 
            $featured_img->move('uploads/posts', $featured_img_new_name);
            
            //Saving the other Form Inputs. 
            $post = Post::create([
                'post_title' => $request->postTitleInput,
                'post_body' => $request->postContentInput,
                'featured_img' => 'uploads/posts/'.$featured_img_new_name,
                'category_id'=> $request->category_id,
                'slug'=> str_slug($request->postTitleInput),
                'user_id' => Auth::id(),
            ]);
            
            $post->tags()->attach($request->tags);
        
        Session::flash('success', 'Post created successfully.');

        
        return redirect()->back();
//            
//        $post = new App\Post;
//        $post->Post_title = $request->postTitleInput;
//        $post->Post_body = $request->postContentInput;
//        $post->featured_img = $request->featuredImageInput;
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
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories','tags'));
            
        
        
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
            'postTitleUpdate' => 'required',
            'postContentUpdate' => 'required',
            'featuredImageUpdate' => 'required|image',
            'category_id_update' => 'required'
        ]);
            
            //Saving the Image file. 
            $featured_img = $request->featuredImageUpdate;
            $featured_img_new_name_update = time().$featured_img->getClientOriginalName(); 
            //This above getClientOriginalName(); function is to retain the original file name uploaded by a client. 
            $featured_img->move('uploads/posts', $featured_img_new_name_update);
            
            //Saving the other Form Inputs.
            $post = Post::find($id);
            $post->post_title = $request->postTitleUpdate;
            $post->post_body = $request->postContentUpdate;
            $post->featured_img = 'uploads/posts/'.$featured_img_new_name_update;
            $post->category_id = $request->category_id_update;
            $post->slug = str_slug($request->postTitleUpdate);
            $post->save();
            
        $post->tags()->sync($request->tags);
        
        Session::flash('success', 'Post updated successfully.');

        
        return redirect()->route('posts.index');
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
        $post = Post::find($id);
        $post->delete();
        
        Session::flash('success', 'You have trashed the post.');
        return redirect()->back();
    }
    
    public function trash()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed', compact('posts'));
    }
    
    public function kill($id){
        $post = Post::withTrashed()->where('id' , $id)->first();

        $post->forceDelete();
        Session::flash('success', 'Post deleted Permanently.');
        return redirect()->back();
        //return view('admin.posts.trashed', compact('post'));
    }
    
    public function restore($id){
        $post = Post::withTrashed()->where('id' , $id)->restore();
        Session::flash('success', 'Post restored successfully.');
        return redirect()->back();
        //return view('admin.posts.trashed', compact('post'));
    }
}
