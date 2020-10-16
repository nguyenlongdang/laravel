@extends('layout.backend.layout')

@section('title', 'Trang cập nhật nhà cung cấp')

@section('linkCSS')
    <link href="{{ url('') }}\assets\libs\select2\css\select2.min.css" rel="stylesheet" type="text/css">
    <link href="{{ url('') }}\assets\libs\dropify\dropify.min.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Cập nhật nhà cung cấp</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Nhà cung cấp</a></li>
                        <li class="breadcrumb-item active">Cập nhật</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <a href="{{ route('adminProducerIndex') }}" class="btn btn-danger waves-effect waves-light mb-4"><i
            class="bx bx-arrow-back mr-2"></i> Quay Lại</a>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="custom-validation" enctype="multipart/form-data" method="POST"
                        action="{{ route('adminProducerPostEdit', $row['id']) }} ">
                        @csrf
                        <input type="hidden" name="thumbOld" value="{{ $row['thumb'] }} ">
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="text-capitalize">Tên nhà cung cấp</label>
                                    <input type="text" value="{{ old('name') ? old('name') : $row['name'] }}"
                                        class="form-control @error('name') parsley-error @enderror" name="name">

                                    @error('name')
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="text-capitalize">Số điện thoại</label>
                                    <input type="text" value="{{ old('phone') ? old('phone') : $row['phone'] }}"
                                        class="form-control @error('phone') parsley-error @enderror" name="phone">

                                    @error('phone')
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="text-capitalize">Email</label>
                                    <input type="text" value="{{ old('email') ? old('email') : $row['email'] }}"
                                        class="form-control @error('email') parsley-error @enderror" name="email">

                                    @error('email')
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="text-capitalize">Website</label>
                                    <input type="text" value="{{ old('website') ? old('website') : $row['website'] }}"
                                        class="form-control @error('website') parsley-error @enderror" name="website">

                                    @error('website')
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <div>
                                <textarea class="form-control @error('address') parsley-error @enderror"
                                    name="address" rows="5"> {{ old('address') ? old('address') : $row['address'] }} </textarea>
                            </div>

                            @error('address')
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{ $message }}</li>
                            </ul>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label text-capitalize">Ảnh đại diện</label>
                            <input type="file" name="thumb" class="dropify" data-default-file="<?= $row['thumb'] == 'default.jpg' ? url('uploads/' . $row['thumb']) : url('uploads/producer/'.$row['thumb']) ?>">
                            @error('thumb')
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{ $message }}</li>
                            </ul>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                    Cập nhật
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
