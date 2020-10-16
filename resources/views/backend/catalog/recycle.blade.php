@extends('layout.backend.layout')

@section('title', 'Trang xem danh sách thùng rác danh mục sản phẩm')

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
                <h4 class="mb-0 font-size-18">Danh sách thùng rác danh mục</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Danh mục</a></li>
                        <li class="breadcrumb-item active">Xem danh sách thùng rác</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <a href="{{ route('adminCatalogIndex') }}" class="btn btn-danger waves-effect waves-light mb-4"><i
        class="bx bx-arrow-back mr-2"></i> Quay Lại</a>

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
                                <th>Tên danh mục</th>
                                <th>Danh mục cha</th>
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
                                            <img src="{{ url('uploads/catalog/' . $item->thumb) }}" width="100px"
                                                class="img-fluid" alt="{{ $item->name }}">
                                        @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->parent_id }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('adminCatalogRestore', $item->id) }}"
                                            onclick="return confirm('Bạn có chắc chắn muốn khôi phục không ?')"
                                            class="btn btn-info btn-rounded waves-effect waves-light">
                                            <i class="mdi mdi-restore"></i>
                                        </a>

                                        <a href="{{ route('adminCatalogDelete', $item->id) }}"
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
