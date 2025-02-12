@extends('layouts.socialMedia')
@section('socialMedia')

{{--    bio address birthdate--}}

    <div class=" shadow-sm">
        <form action="{{route('profile.update', $profile->id)}}" class="container p-4 m-4" method="POST">
            <h3>Edit Profile</h3>
            @csrf
            @Method('PUT')
            <input type="text" value="{{old('bio',$profile->bio)}}" placeholder="bio" name="bio">
            <input type="text" value="{{old('address',$profile->address)}}" placeholder="address" name="address">
            <input type="date" value="{{old('birthdate',$profile->birthdate)}}" placeholder="birth date" name="birthdate">
            <button type="submit">submit</button>
        </form>
    </div>

@endsection
