@extends('layouts.socialMedia')
@section('socialMedia')

{{--    bio address birthdate--}}

    <form action="{{route('profile.store')}}" class="container p-4 m-4" method="POST">
        @csrf
        <input type="text"  placeholder="bio" name="bio">
        <input type="text" placeholder="address" name="address">
        <input type="date" placeholder="birth date" name="birthdate">
        <button type="submit">submit</button>
    </form>

@endsection
