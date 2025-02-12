<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::where('user_id',auth()->id())->first();
        if($profile){

            return view('profile.index', compact('profile'));
        }else{
            return view('profile.create');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {


        $profile = Profile::create([
            'user_id' => auth()->id(),
           'address' => $request->address,
           'bio'=> $request->bio,
           "birthdate" => $request->birthdate
        ]);
        return redirect()->route('profile.index')->with('success','new profile created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $profile = Profile::where('user_id', $id)->first();
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProfileRequest $request, Profile $profile)
    {


        $profile->update([
            'address' => $request->address,
            'bio'=> $request->bio,
            "birthdate" => $request->birthdate
        ]);
        return redirect()->route('profile.index')->with('success',' profile updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('profile.index')->with('success', 'Profile deleted successfully');
    }
}
