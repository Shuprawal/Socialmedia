<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('tags')->get();
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::orderBy('id','desc')->get();
        return view('post.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData=$request->validate([

            'description' => 'required',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $path = null;
        if ($request->hasFile('image')) {
//            $pathOfPhoto = $request->file('image');
            $path = $request->file('image')->store('uploads', 'public');

        }
        //dd($pathOfPhoto);
        $post=Post::create([

            'user_id' => auth()->id(),
            'description' => $validatedData['description'],
            'image'=> $path
        ]);

        $post->tags()->attach($validatedData['tags']);
//        $post -> tags()->attach($request->tags);

        return redirect()->route('posts.index')->with('success','new post created');
    }




    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $tags = Tag::orderBy('id','desc')->get();
        $posts = Post::with('tags')->where('id',$post->id)->first();
        return view('post.edit',compact('posts','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validatedData=$request->validate([

            'description' => 'required',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $post->image;
        if ($request->hasFile('image')) {

            $path = $request->file('image')->store('uploads', 'public');

        }

        $post->update([

            'description' => $validatedData['description'],
            'image'=> $path
        ]);

        if (isset($validatedData['tags'])) {
            $post->tags()->sync($validatedData['tags']);
        }


        return redirect()->route('posts.index')->with('success','new post created');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success','post deleted');
    }

    public function search(Request $request)
    {
//        dd($request->all());
     $search = $request->input('search');
     $result = Post::where('description','LIKE','%'.$search.'%')->orWhereHas('tags',function ($query) use ($search){
         $query->where('name','LIKE','%'.$search.'%');
     })->get();
     return view('search',compact('result'));

    }
}
