@extends('admin.layouts.default')
@section('title')
@endsection
@push('style')
    
@endpush
@section('content')
<div class="container">
    <h1 class="my-4">Chỉnh Sửa Danh Mục</h1>
    <form action="{{ route('admin.category.updatePatchCategory', $category->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Tên Danh Mục</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Cập Nhật</button>
    </form>
</div>
@endsection
@push('script')

@endpush