<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use App\Tag;
use Illuminate\Http\Request;


class FrontEndController extends Controller
{

    public function index()
    {
       /* $s = Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first();
        dd($s);*/

        return view('index')

            ->with('title',Setting::first()->site_name  )
            ->with('categories', Category::all()->take(5))
            ->with('first_post',Post::orderBy('created_at','desc')->first())
            ->with('second_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
            ->with('third_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
            ->with('career',Category::find(7))
            ->with('wordpress',Category::find(3))
            ->with('js',Category::find(5))
            ->with('settings', Setting::first());

    }

    public function singlePost($slug){

        $post = Post::where('slug', $slug)->first();

        $next_id = Post::where('id', '>' , $post->id)->min('id');
        $prev_id = Post::where('id', '<' , $post->id )->max('id');

        return view('single')
                ->with('post',$post)
                ->with('title',$post->title )
                ->with('categories', Category::all()->take(5))
                ->with('settings', Setting::first())
                ->with('next' , Post::find($next_id))
                ->with('prev' , Post::find($prev_id))
                ->with('tags', Tag::all());


    }
    public function category($id){

        $category = Category::find($id);

        return view('category')
            ->with('category', $category)
            ->with('title', $category->name )
            ->with('categories', Category::all()->take(5))
            ->with('settings', Setting::first())
            ->with('tags', Tag::all())

            ;
    }


    public function tag($id){

        $tag = Tag::find($id);

        return view('tag')
            ->with('tag', $tag)
            ->with('title', $tag->tag )
            ->with('categories', Category::all()->take(5))
            ->with('settings', Setting::first())
            ->with('tags', Tag::all())


            ;
    }
}
