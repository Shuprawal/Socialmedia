@extends('layouts.socialMedia')
@section('socialMedia')

    <form action="{{route('posts.store')}}" class="m-4 p-4 shadow-sm" method="post" enctype="multipart/form-data">
        <h3>Create Post</h3>
        @csrf
        <div class="form-floating mb-3">
            <textarea class="form-control @error('description') is-invalid @enderror "   name="description" id="floatingTextarea2" style="height: 100px"></textarea>
            @error('description')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
            <label for="floatingTextarea2">Say Something about this post</label>
        </div>

        <select class="form-select mb-3" size="3" name="tags[]" aria-label="Size 3 select example" multiple>
            @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{ $tag->name }}</option>
            @endforeach
        </select>
        @error('tags')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Choose Image</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror " id="inputGroupFile01">
            @error('image')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
