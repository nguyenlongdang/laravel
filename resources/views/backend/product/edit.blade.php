@extends('layout.backend.layout')

@section('title', 'Trang cập nhật sản phẩm')

@section('linkCSS')
    <link href="{{ url('') }}\assets\libs\select2\css\select2.min.css" rel="stylesheet" type="text/css">
    <link href="{{ url('') }}\assets\libs\dropify\dropify.min.css" rel="stylesheet" type="text/css">
    <!-- dropzone css -->
    <link href="{{ url('') }}\assets\libs\dropzone\min\dropzone.min.css" rel="stylesheet" type="text/css">
    <!-- Summernote css -->
    <link href="{{ url('') }}\assets\libs\summernote\summernote-bs4.min.css" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Cập nhật sản phẩm</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sản phẩm</a></li>
                        <li class="breadcrumb-item active">Cập nhật</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <a href="{{ route('adminProductIndex') }}" class="btn btn-danger waves-effect waves-light mb-4"><i
            class="bx bx-arrow-back mr-2"></i> Quay Lại</a>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="custom-validation" enctype="multipart/form-data" method="POST"
                        action="{{ route('adminProductPostEdit', $row['id']) }} ">
                        @csrf
                        <input type="hidden" name="thumbOld" value="{{ $row['thumb'] }} ">

                        @php
                        $thumb_list = explode(',', $row['thumb_list']);
                        foreach ($thumb_list as $img) {
                        echo '<input type="hidden" name="imagesUploads[]" value=" '.$img.' ">';
                        }
                        @endphp

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="text-capitalize">Tên sản phẩm</label>
                                    <input type="text" value="{{ old('name') ? old('name') : $row['name'] }}"
                                        class="form-control @error('name') parsley-error @enderror" name="name">

                                    @error('name')
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label text-capitalize">Mã sản phẩm</label>
                                    <input type="text" value="{{ old('sku') ? old('sku') : $row['sku'] }}"
                                        class="form-control @error('sku') parsley-error @enderror" name="sku">

                                    @error('sku')
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="text-capitalize">Số lượng</label>
                                    <input type="text" value="{{ old('quantity') ? old('quantity') : $row['quantity'] }}"
                                        class="form-control @error('quantity') parsley-error @enderror" name="quantity">

                                    @error('quantity')
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label text-capitalize">Giá gốc</label>
                                    <input type="text" value="{{ old('price') ? old('price') : $row['price'] }}"
                                        class="form-control @error('price') parsley-error @enderror" name="price">

                                    @error('price')
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label text-capitalize">Khuyễn mãi (%)</label>
                                    <input type="text" value="{{ old('sale') ? old('sale') : $row['sale'] }}"
                                        class="form-control @error('sale') parsley-error @enderror" name="sale">

                                    @error('sale')
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="text-capitalize">Danh mục</label>
                                    <select class="form-control select2" name="catid">
                                        <option value="" selected>[--- Select --- ]</option>
                                        @foreach ($categories as $key => $category)
                                            @if ($row->catid == $key)
                                                <option value="{{ $key }}" selected> {{ $category }} </option>
                                            @else
                                                <option value="{{ $key }}" {{ old('catid') == $key ? 'selected' : '' }}>
                                                    {{ $category }} </option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('catid')
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label text-capitalize">Thương hiệu</label>
                                    <select class="form-control select2" name="brandid">
                                        <option value="" selected>[--- Select --- ]</option>
                                        @foreach ($brand as $item)
                                            @if ($row->brandid == $item->id)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->name }} </option>
                                            @else
                                                <option value="{{ $item->id }}"
                                                    {{ old('brandid') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }} </option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('brandid')
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="control-label text-capitalize">Nhà cung cấp</label>
                                    <select class="form-control select2" name="producerid">
                                        <option value="" selected>[--- Select --- ]</option>
                                        @foreach ($producer as $item)
                                            @if ($row->producerid == $item->id)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->name }} </option>
                                            @else
                                                <option value="{{ $item->id }}"
                                                    {{ old('producerid') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }} </option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('producerid')
                                    <ul class="parsley-errors-list filled">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label text-capitalize">Ảnh đại diện</label>
                            <input type="file" class="dropify" name="thumb" data-default-file="<?= $row['thumb'] == 'default.jpg' ? url('uploads/' . $row['thumb']) : url('uploads/product/' . $row['thumb']) ?>">
                                @error('thumb')
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">{{ $message }}</li>
                                </ul>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="card-box">
                                    <label class="control-label text-capitalize">Ảnh kèm theo</label>
                                    <div class="input-images-1" style="padding-top: .5rem;"></div>
                                </div>

                                @error('thumb_list')
                                <ul class="list-unstyled mt-1">
                                    <li class="parsley-required text-danger"> </li>
                                </ul>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Mô tả ngắn</label>
                                <div>
                                    <textarea class="form-control @error('intro_desc') parsley-error @enderror"
                                        name="intro_desc" rows="5"> {{ old('intro_desc') ? old('intro_desc') : $row['intro_desc'] }}</textarea>
                                </div>

                                @error('intro_desc')
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">{{ $message }}</li>
                                </ul>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Chi tiết sản phẩm</label>
                                <textarea class="summernote @error('detail_desc') parsley-error @enderror" name="detail_desc"
                                    rows="5"> {{ old('detail_desc') ? old('detail_desc') : $row['detail_desc'] }}</textarea>

                                @error('detail_desc')
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">{{ $message }}</li>
                                </ul>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Meta Title (SEO)</label>
                                <div>
                                    <textarea class="form-control @error('meta_title') parsley-error @enderror"
                                        name="meta_title" rows="5"> {{ old('meta_title') ? old('meta_title') : $row['meta_title'] }}</textarea>
                                </div>

                                @error('meta_title')
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">{{ $message }}</li>
                                </ul>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Meta Keyword (SEO)</label>
                                <div>
                                    <textarea class="form-control @error('meta_keyword') parsley-error @enderror"
                                        name="meta_keyword" rows="5"> {{ old('meta_keyword') ? old('meta_keyword') : $row['meta_keyword'] }}</textarea>
                                </div>

                                @error('meta_keyword')
                                <ul class="parsley-errors-list filled">
                                    <li class="parsley-required">{{ $message }}</li>
                                </ul>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Meta Description (SEO)</label>
                                <div>
                                    <textarea class="form-control @error('meta_description') parsley-error @enderror"
                                        name="meta_description" rows="5"> {{ old('meta_description') ? old('meta_description') : $row['meta_description'] }} </textarea>
                                </div>

                                @error('meta_description')
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
        <!-- dropzone plugin -->
        <script src="{{ url('') }}\assets\libs\dropzone\min\dropzone.min.js"></script>
        <!-- Summernote js -->
        <script src="{{ url('') }}\assets\libs\summernote\summernote-bs4.min.js"></script>

        <!-- init js -->
        <script src="{{ url('') }}\assets\js\pages\form-editor.init.js"></script>
        <!-- form advanced init -->
        <script src="{{ url('') }}\assets\js\pages\dropify.init.js"></script>
        <script src="{{ url('') }}\assets\js\pages\form-advanced.init.js"></script>

        <script>
             @if (!empty($row['thumb_list']))
            let preloaded = [
                @php
                    $imagesUploads = explode(',', $row['thumb_list']);
                    $no = 1;
                @endphp
                
                @foreach ($imagesUploads as $img)
                {
                    id: {{ $no++ }},
                    src: "{{ url('uploads/product/' . $img) }}"
                },
                @endforeach
            ];
            
            $('.input-images-1').imageUploader({
                preloaded: preloaded,
                imagesInputName: 'images',
                preloadedInputName: 'old'
            });
            @else
            $('.input-images-1').imageUploader();
            @endif
        </script>
@endsection
