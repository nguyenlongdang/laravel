@extends('layout.backend.layout')

@section('title', 'Trang xem danh sách thương hiệu sản phẩm')

@section('linkCSS')
    <!-- DataTables -->
    <link href="{{ url('') }}\assets\libs\datatables.net-bs4\css\dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css">
    <!-- Responsive datatable examples -->
    <link href="{{ url('') }}\assets\libs\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css">
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Danh sách thương hiệu</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Thương hiệu</a></li>
                        <li class="breadcrumb-item active">Xem danh sách</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <a href="{{ route('adminBrandAdd') }}" class="btn btn-primary waves-effect waves-light mb-4"><i
            class="bx bx-plus-medical mr-2"></i> Thêm mới</a>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-check-all mr-2"></i>
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr class="text-capitalize">
                                <th>#</th>
                                <th></th>
                                <th>Tên thương hiệu</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                                <tr>
                                    <td>{{ $no++ }} </td>
                                    <td>
                                        @if ($item->thumb == 'default.jpg')
                                            <img src="{{ url('uploads/' . $item->thumb) }}" width="100px" class="img-fluid"
                                                alt="{{ $item->name }}">
                                        @else
                                            <img src="{{ url('uploads/brand/' . $item->thumb) }}" width="100px"
                                                class="img-fluid" alt="{{ $item->name }}">
                                        @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <a href="{{ route('adminBrandStatus', $item->id) }}"
                                                class="btn btn-primary w-sm waves-effect waves-light">
                                                <i class="bx bx-check-circle"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('adminBrandStatus', $item->id) }}"
                                                class="btn btn-danger w-sm waves-effect waves-light">
                                                <i class="bx bx-x-circle"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('adminBrandEdit', $item->id) }}"
                                            class="btn btn-warning btn-rounded waves-effect waves-light">
                                            <i class="bx bx-pencil"></i>
                                        </a>

                                        <a href="{{ route('adminBrandDelete', $item->id) }}"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa vĩnh viễn không ?')"
                                            class="btn btn-danger btn-rounded waves-effect waves-light">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection

@section('linkJS')
    <!-- Required datatable js -->
    <script src="{{ url('') }}\assets\libs\datatables.net\js\jquery.dataTables.min.js"></script>
    <script src="{{ url('') }}\assets\libs\datatables.net-bs4\js\dataTables.bootstrap4.min.js"></script>
    <!-- Responsive examples -->
    <script src="{{ url('') }}\assets\libs\datatables.net-responsive\js\dataTables.responsive.min.js"></script>
    <script src="{{ url('') }}\assets\libs\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js"></script>
    <!-- Datatable init js -->
    <script src="{{ url('') }}\assets\js\pages\datatables.init.js"></script>
@endsection
