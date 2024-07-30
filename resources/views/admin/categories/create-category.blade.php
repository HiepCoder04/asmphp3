@extends('admin.layouts.default')
@section('title')
@endsection
@push('style')
    
@endpush
@section('content')
<div class="container">
    <h1 class="my-4">Thêm Danh Mục</h1>
    <form action="{{ route('admin.category.createPostCategory') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Tên Danh Mục</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên danh mục" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Thêm</button>
    </form>
</div>
@endsection
@push('script')
    
@endpush
