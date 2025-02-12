@extends('layouts.socialMedia')
@section('socialMedia')
    <div class="container m-4 p-4 shadow-sm" xmlns="http://www.w3.org/1999/html">
        <h3>List of tags</h3>
        @foreach ($tags as $tag)
            <div class="d-flex align-items-center gap-5 m-2 p-2">
                <span class="me-3">{{$tag->name}}</span>

                @if($tag->user_id == auth()->id()||Auth::user()->role == 'admin')
                <div class="d-flex gap-2">
                    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-success">Edit</a>

                    <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" class="m-0 p-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
                @endif

            </div>

        @endforeach
        <a href="{{route('tags.create')}}" class="btn btn-outline-primary">Create new tag</a>
    </div>


@endsection

