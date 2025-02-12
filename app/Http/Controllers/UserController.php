<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role','user')->get();
        return view('User.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {


//        $request->validate([
//            'name' => ['required','regex:/^[a-zA-Z\s]+$/'],
//            'username' => 'required|min:3',
//            'email' => 'required|email|unique:users',
//            'password' =>'required|min:6|confirmed'
//
//        ]);

        $checkName = User::where('username', $request->username)->first();

        if($checkName){
            $newName = $checkName->username;
            $count = 1;
            while(User::where('username',$newName)->exists()){
                $newName = $newName . $count;
                $count++;
            }
            return back()->withErrors(['username'=>"Username is already taken, Try $newName"])->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password
//        $request->validated()
        ]);

        return redirect()->back()->with('success','new user created');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('User.register');
    }

    public function showLogin()
    {
        return view('User.login');
    }

    public function checkLogin(UserLoginRequest $request)
    {
//        $request->validate([
//            'email' => 'required',
//            'password' =>'required|min:6'
//        ]);


//        $checkEmail = User::where('email', $request->email)->orWhere('name',$request->email)->first();
//        if(!$checkEmail){
//            return redirect()->back()->withInput()->withErrors(['email'=>'email does not exist']);
//        }

        if(User::where('email', $request->email)-> exists() ){
            $login = 'email';
        }elseif (User::where('username', $request->email)-> exists()){
            $login = 'username';
        }else{
            return redirect()->back()->withInput()->withErrors(['email'=>'email or username does not exist']);
        }


        if(Auth::attempt([$login => $request->email, 'password' => $request->password])){
//            $request->session()->regenerate();

            return redirect()->route('userDashboard');
//            return redirect()->back()->with('success','you are logged in  ');
        }else{
            return redirect()->back()->with('error','credientals dont match');
        }
//        if($checkEmail && Hash::check($request->password, $checkEmail->password )){
//            return redirect()->back()->with('success','yea it matched');
//        }else{
//            return redirect()->back()->with('error','credientals dont match');
//        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success','user deleted');
    }

    public  function logout(){
        Auth::logout();
        return redirect()->route('loginUser')->with('success','you are logged out');
    }

    public function userDashboard(){
        return view('Dashboard');
    }
}
