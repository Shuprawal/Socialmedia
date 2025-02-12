

@extends('layouts.socialMedia')
@section('socialMedia')

        <div class="container m-2 p-4 ">
            <div class="row">
                <div class="col-md-12">
                    <h3>Name</h3>
                    <p class="text-muted">Hii {{ auth()->user()->name }}</p>
                </div>
                <div class="col-md-12">
                    <h3>Username</h3>
                    <p class="text-muted">Hii {{ auth()->user()->username }}</p>
                </div>
                <div class="col-md-12">
                    <h3>Username</h3>
                    <p class="text-muted">Hii {{ auth()->user()->username }}</p>
                </div>
            </div>

{{--            <h3>Hii {{ auth()->user()-> }}</h3>--}}
            <h3>Hii {{ auth()->user()->email }}</h3>


            <a href="{{ route('logoutUser') }}"  class="btn btn-primary">Logout</a>
        </div>



@endsection

