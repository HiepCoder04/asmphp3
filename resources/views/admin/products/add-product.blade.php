@extends('admin.layouts.default')
@section('title')
    @parent
    Thêm mới sản phẩm
@endsection
@push('style')
    
@endpush
@section('content')
<div class="d-flex">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="col-xl-12 mb-5 mb-xl-10">
            <div class="card card-flush h-xl-100">
                <div class="card-header pt-5 w-100">
                    <div class="d-flex justify-content-between mb-10 w-100">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">
                                Quản lý Sản Phẩm
                            </span>
                        </h3>
                    </div>
                </div>
                <div class="card-body pt-2">                 
                        <div class="tab-pane fade show active" id="kt_stats_widget_16_tab_1">
                            <form action="{{ route('admin.product.addPostProduct') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="nameSP" class="form-label">Tên sản phẩm</label>
                                    <input type="text" name="nameSP" id="nameSP" class="form-control" placeholder="Nhập tên sản phẩm" required>
                                </div>
                                <div class="mb-3">
                                    <label for="priceSP" class="form-label">Giá sản phẩm</label>
                                    <input type="text" name="priceSP" id="priceSP" class="form-control" placeholder="Nhập giá sản phẩm" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Mô tả</label>
                                    <textarea name="description" id="description" class="form-control" rows="5" placeholder="Nhập mô tả sản phẩm" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="categorySP" class="form-label">Danh mục sản phẩm</label>
                                    <select class="form-select" id="categorySP" name="categorySP" required>
                                        <option value="" disabled selected>Chọn danh mục</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Thêm Mới</button>
                            </form>
                            
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    
@endpush