@extends('layouts.socialMedia')
@section('socialMedia')

{{--    bio address birthdate--}}

<div class="container m-4 p-4">
    <a href="{{ route('profile.edit', auth()->id()) }}">Edit Profile</a>

    <h1>Profile</h1>
    <p>Name: {{ auth()->user()->name }}</p>
    <p>Username: {{ auth()->user()->username }}</p>
    <p>Email: {{ auth()->user()->email }}</p>
    <p>Address: {{ $profile->address }}</p>
    <p>Birthdate: {{ $profile->birthdate }}</p>
    <p>Bio: {{ $profile->bio }}</p>



    <form action="{{ route('profile.destroy', $profile->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Profile</button>
    </form>
</div>

@endsection

