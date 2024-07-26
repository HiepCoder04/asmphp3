<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <h4 class="mt-4">Đăng nhập</h4>
        @if(session('message'))
            <p class="text-danger">{{session('message')}}</p>
        @endif
        <form action="{{route('postLogin')}}" method="post">
            @csrf
            <div class="mb-3">
            Email:
            <input type="email" class="form-control" name="email" id="email">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
            </div>
            <div class="mb-3">
            Password:
            <input type="password" class="form-control" name="password" id="password">
            @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </form>
    </div>
</body>
</html>