<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Category;
use  Session;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $tags = Tag::all();

        if($category->count() == 0 | $tags->count() == 0)
        {
            Session::flash('info','You must have some categories and tags before attempting to create  post');

            return redirect()->back();
        }

        return view ('admin.posts.create')->with('categories',$category)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());

        $this->validate($request,[

            'title' => 'required | min:5',
            'featured' => 'required | image',
            'content' => 'required | ',
            'category_id' => 'required',
            'tags' => 'required'
            ],
            //for custom validation message
            [
                'category_id.required' => 'The category field is required for a post'
            ]

        );

       // dd($request->all());

        $featured = $request->featured;
        $featured_name = time(). $featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_name);

        $post = Post::create([

            'title' => $request->title,
            'content' => $request->content,
            'featured' => '/uploads/posts/' . $featured_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            'user_id' => Auth::id()
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success','Post created successfully');

        return redirect()->back();

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
        $post = Post::find($id);

        return view('admin.posts.edit')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
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

            'title' => 'required | min:5',
            'content' => 'required | ',
            'category_id' => 'required',
            'tags' => 'required'
        ],
            //for custom validation message
            [
                'category_id.required' => 'The category field is required for a post'
            ]

        );

        $post = Post::find($id);
        // dd($request->all());

        if($request->hasFile('featured')){

            $featured = $request->featured;

            $featured_name = time(). $featured->getClientOriginalName();

            $featured->move('uploads/posts',$featured_name);

            $post->featured = 'uploads/posts/'.  $featured_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success','Post updated successfully');

        return redirect()->route('posts');
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

        $post->delete();
        Session::flash('success','The post moved to  trash');

        return redirect()->back();
    }



    /*see the trashed posts*/
    public function trashed(){

        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts',$posts);
    }

    //function to remove a post from db
    public function kill($id){

        $post = Post::withTrashed()->where('id',$id)->first();

        $post->forceDelete();
        Session::flash('success', 'Post deleted permanently');
        return redirect()->back();
    }


    /*function to restore a trashed post*/
    public function restore($id){

        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success', 'Post restored successfully');
        return redirect()->route('posts');

    }
}
