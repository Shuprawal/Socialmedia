@extends('layouts.socialMedia')
@section('socialMedia')

    <form action="{{route('tags.store')}}" class="m-4 p-4 shadow-sm" method="post" >
        <h3>Create tag</h3>
        @csrf
        <div class="col-12 mb-3">
            <label for="inputAddress" class="form-label">Enter tag</label>
            <input type="text" class="form-control" id="inputAddress" name="name" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
