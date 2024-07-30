@extends('admin.layouts.default')
@section('title')
    @parent
    Danh sách sản phẩm
@endsection
@push('style')
    
@endpush
@section('content')
<div class="d-flex">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="col-xl-12 mb-5 mb-xl-10">
            <div class="card card-flush h-xl-100">
                @if(session('message'))
                <div class="alert alert-primary" role="alert">
                   {{session('message')}}
                  </div>
                @endif
                <div class="card-header pt-5 w-100">
                    <div class="d-flex justify-content-between mb-10 w-100">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">
                                Quản lý Sản Phẩm
                            </span>
                           
                        </h3>
                        <a href="{{ route('admin.product.addProduct') }}" class="btn btn-sm fw-bold btn-primary">Add Target</a>
                    </div>
                </div>

                <div class="card-body pt-2">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_stats_widget_16_tab_1">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover align-middle gs-0 gy-3 my-0">
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                            <th class="p-0 pb-3 min-w-100px text-center">STT</th>
                                            <th class="p-0 pb-3 min-w-150px text-center">Tên sản phẩm</th>
                                            <th class="p-0 pb-3 min-w-150px text-center">Giá Tiền</th>
                                            <th class="p-0 pb-3 min-w-150px text-center">Mô tả</th>
                                            <th class="p-0 pb-3 min-w-150px text-center">Danh Mục</th>
                                            <th class="p-0 pb-3 min-w-150px text-center">Ảnh sản phẩm</th>
                                            <th class="p-0 pb-3 min-w-100px text-center">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listProduct as $key => $value)
                                            <tr>
                                                <td class="text-center">{{ $key + 1 }}</td>
                                                <td class="text-center">{{ $value->name }}</td>
                                                <td class="text-center">{{ $value->price }}</td>
                                                <td class="text-center">{{ $value->description }}</td>
                                                <td class="text-center">{{ $value->category->name }}</td>
                                                <td>
                                                    @if ($value->images->count() > 0)
                                                        <img src="{{ Storage::url($value->images->first()->image_url) }}" alt="{{ $value->name }}" width="100">
                                                    @else
                                                        Không có ảnh
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{route('admin.product.updateProduct', $value->id)}}" class="btn btn-warning btn-sm" >Sửa</a>
                                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id = "{{ $value->id }}">Xóa</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $listProduct->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Cảnh báo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post" id="formDelete">
            @method('delete')
            @csrf
            <div class="modal-body">
                <p class="text">Bạn có muốn xóa không ?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-danger">Xác nhận xóa</button>
              </div>
        </form>
      </div>
    </div>
</div>

@endsection

@push('script')
    <script>
        var exampleModal = document.getElementById('deleteModal')
        exampleModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var id = button.getAttribute('data-bs-id')
        let formDelete = document.getElementById('formDelete')
        formDelete.setAttribute('action', '{{ route("admin.product.deleteProduct") }}' + "?idproduct=" +id)
})
    </script>
@endpush
