<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::orderBy('id','desc')->get();
        return view('tag.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {


        Tag::create([
            'name'=> $request->name,
            'user_id'=> auth()->id(),
        ]);
        return redirect()->route('tags.index')->with('success','new tag created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
       $tags = Tag::where('id',$tag->id)->first();
       return view('tag.edit',compact('tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTagRequest $request, Tag $tag)
    {

        $tag->update([
            'name'=> $request->name,
            'user_id'=> auth()->id(),
        ]);
        return redirect()->route('tags.index')->with('success','tag updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success','tag deleted');
    }
}
