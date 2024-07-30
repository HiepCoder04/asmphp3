@extends('users.layouts.default')

@push('style')
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Đăng kí</h4>
                </div>
                <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-danger">{{session('message')}}</div>
                    @endif
                    <form action="{{route('postRegister')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" placeholder="Tên đăng nhập" name="name" id="name" >
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" id="email" >
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" placeholder="Mật khẩu" name="password" id="password" >
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>
                        <button type="submit" class="btn btn-success">Đăng kí</button>
                    </form>
                    {{-- <a href="{{route('login')}}" class="btn btn-primary mt-3">Đăng nhập</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush
