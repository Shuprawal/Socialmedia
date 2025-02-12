<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


    <form class="m-2 my-4 p-2 border shadow-sm" method="POST" action="{{route('checkLogin')}}">
        @csrf
        <h3>Login</h3>

        <div class="col-8 mb-2">
            <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email or username" name="email" value="{{old('email')}}" aria-label="Email">
            @error('email')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-8 mb-2">
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" name="password" aria-label="password">
            @error('password')
                <p class="invalid-feedback"> {{ $message }}</p>
            @enderror
        </div>


        <p class="text-muted m-2"><a href="{{route('newUser')}}">Don't have an account</a></p>

        <button class="btn btn-primary">Login</button>

    </form>
</body>

</html>