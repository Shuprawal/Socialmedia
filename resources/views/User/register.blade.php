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

<form class="m-2 my-4 p-2 border shadow-sm" method="POST" action="{{route('registerUser')}}">
    @csrf
    <h3>Register</h3>
    <div class="row mb-2">
        <div class="col-4">
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="First name" name="name" aria-label="name">
            @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-4">
            <input type="text" class="form-control @error('username') is-invalid @enderror " placeholder="Username" name="username"  aria-label="Username">
            @error('username')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>


    </div>

    <div class="col-8 mb-2">
            <input type="email" class="form-control @error('email') is-invalid @enderror " placeholder="Enter email" name="email" aria-label="Email">
            @error('email')
                <p class="invalid-feedback"> {{ $message }} </p>
            @enderror
        </div>

        <div class="col-8 mb-2">
            <input type="password" class="form-control  @error('password') is-invalid @enderror " placeholder="Enter password" name="password" aria-label="password">
            @error('password')
                <p class="invalid-feedback"> {{ $message }} </p>
            @enderror
        </div>


        <div class="col-8 mb-2">
            <input type="password" class="form-control @error('password') is-invalid @enderror " placeholder="Enter password" name="password_confirmation" aria-label="password_confirmation">
            @error('password')
                <p class="invalid-feedback"> {{ $message }} </p>
            @enderror
        </div>

        <p class="text-muted m-2"><a href="{{route('loginUser')}}">Already have an account</a></p>

        <button class="btn btn-primary" type="submit">Register</button>

 
</form  >
</body>
</html>