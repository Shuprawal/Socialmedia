@extends('layouts.socialMedia')
@section('socialMedia')

    <div class="container m-4 p-4 shadow-sm">
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-2">Create Post</a>
        @foreach ($posts as $post)

            <div class="card cols-md-3 g-4 m-4" style="width: 22rem;">
                <img src="{{asset('storage/' . $post->image) }}" class="card-img-top" alt="...">

                <div class="card-body">
                    <p class="card-text">{{ $post->description }}</p>
                    <p class="card-text"><small class="text-body-secondary">
                            @foreach ($post->tags as $tag)
                                <span>#{{ $tag->name }} </span>
                            @endforeach
                        </small></p>
                    @if($post->user_id == Auth::user()->id || Auth::user()->role == 'admin')
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning" style="display: inline">Edit</a>
                    @endif

                </div>
            </div>
        @endforeach

    </div>

@endsection
