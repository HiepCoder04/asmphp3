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
        <h4 class="mt-4">Đăng kí</h4>
        @if(session('message'))
            <p class="text-danger">{{session('message')}}</p>
        @endif
        <form action="{{route('postRegister')}}" method="post">
            @csrf
            <div class="mb-3">
                Name:
                <input type="text" class="form-control" name="name">

            </div>
            <div class="mb-3">
                Email:
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
            Password:
            <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary">Đăng kí</button>
        </form>
        <a href="{{route('login')}}">Đăng nhập</a>
    </div>
</body>
</html>