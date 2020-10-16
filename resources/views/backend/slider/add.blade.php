@extends('layout.backend.layout')

@section('title', 'Trang thêm mới Slider sản phẩm')

@section('linkCSS')
    <link href="{{ url('') }}\assets\libs\select2\css\select2.min.css" rel="stylesheet" type="text/css">
    <link href="{{ url('') }}\assets\libs\dropify\dropify.min.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Thêm mới Slider</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Slider</a></li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <a href="{{ route('adminSliderIndex') }}" class="btn btn-danger waves-effect waves-light mb-4"><i
            class="bx bx-arrow-back mr-2"></i> Quay Lại</a>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="custom-validation" enctype="multipart/form-data" method="POST"
                        action="{{ route('adminSliderPostAdd') }} ">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="text-capitalize">Tên Slider</label>
                                    <input type="text" value="{{ old('name') }}"
                                        class="form-control @error('name') parsley-error @enderror" name="name">

                                    @error('name')
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label text-capitalize">Ảnh đại diện</label>
                            <input type="file" class="dropify" name="thumb">
                            @error('thumb')
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{ $message }}</li>
                            </ul>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                    Thêm mới
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection

@section('linkJS')
    <script src="{{ url('') }}\assets\libs\select2\js\select2.min.js"></script>
    <script src="{{ url('') }}\assets\libs\dropify\dropify.min.js"></script>
    <!-- form advanced init -->
    <script src="{{ url('') }}\assets\js\pages\dropify.init.js"></script>
    <script src="{{ url('') }}\assets\js\pages\form-advanced.init.js"></script>
@endsection
