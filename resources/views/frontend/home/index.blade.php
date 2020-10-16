@extends('layout.frontend.layout')

@section('title', 'Trang chủ')

@section('content')
    <!-- slider -->
    <section class="section">
        <!-- Swiper -->
        <div class="swiper-container swiper-slider">
            <div class="swiper-wrapper">
                @foreach ($listSlider as $item)
                    <div class="swiper-slide">
                        <img src="{{ url('uploads/slider/' . $item['thumb']) }}" class="img-fluid w-100"
                            alt="{{ $item['name'] }}" />
                    </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- end slider -->

    <!-- service -->
    <section class="section">
       @include('layout.frontend.services')
    </section>
    <!-- end service -->

    <!-- categories -->
    <section class="section">
        <div class="section__categories">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="section__border">
                            <h4 class="section__border-title text-capitalize">
                                Danh mục phổ biến
                            </h4>
                        </div>
                    </div>
                </div>

                <!-- Swiper -->
                <div class="swiper-container swiper-categories">
                    <div class="swiper-wrapper">
                        @foreach ($listCatalog as $item)
                            <div class="swiper-slide">
                                <div class="section__categories-container">

                                    <div class="section__categories-thumb">
                                        <a href="{{ route('userCatalogProducts', $item['slug']) }}">
                                            <img src="{{ url('uploads/catalog/' . $item['thumb']) }}" class="img-fluid"
                                                alt="{{ $item['name'] }}" />
                                        </a>
                                    </div>

                                    <div class="section__categories-content">
                                        <h5 class="text-capitalize">{{ $item['name'] }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <!-- end swiper -->
            </div>
        </div>
    </section>
    <!-- end categories -->

    <!-- section product -->
    <section class="section">
        <div class="section__product">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="section__border mb-4">
                            <h4 class="section__border-title text-capitalize">
                                Sản phẩm mới nhất
                            </h4>
                        </div>
                    </div>
                </div>

                <!-- Swiper -->
                <div class="swiper-container swiper-product">
                    <div class="swiper-wrapper">
                        @foreach ($listProductNews as $item)
                            <div class="swiper-slide">
                                <div class="section__product-container">
                                    <div class="section__product-thumb position-relative">
                                        <a href="{{ route('userDetailProducts', $item['slug']) }}">
                                            <img src="{{ url('uploads/product/' . $item['thumb']) }}" class="img-fluid"
                                                alt="{{ $item['productName'] }}" />
                                        </a>

                                        @if ($item['sale'] > 0)
                                            <div class="section__product-sale">-{{ $item['sale'] }}%</div>
                                        @endif

                                        <span class="ion-search icons section__product-modal" id="{{ $item['id'] }}"
                                            data-toggle="modal" data-target="#dataModal"></span>
                                    </div>

                                    <div class="section__product-info">
                                        <div class="section__product-info-catalog">
                                            <a href="{{ route('userCatalogProducts', $item['catSlug']) }}">
                                                {{ $item['catName'] }} </a>
                                        </div>

                                        <div class="section__product-info-name">
                                            <a href="{{ route('userDetailProducts', $item['slug']) }}">
                                                {{ $item['productName'] }}
                                            </a>
                                        </div>

                                        <div class="section__product-info-star text-warning">
                                            <i class="ion-android-star"></i>
                                            <i class="ion-android-star"></i>
                                            <i class="ion-android-star"></i>
                                            <i class="ion-android-star"></i>
                                            <i class="ion-android-star"></i>
                                        </div>

                                        <div class="section__product-info-price d-flex flex-wrap">
                                            @if ($item['sale'] > 0)
                                                <div class="section__product-info-price-root">
                                                    {{ number_format($item['price'], 0, ',', '.') }}
                                                </div>
                                            @endif

                                            <div class="section__product-info-price-buy">
                                                {{ number_format($item['price'] - $item['price'] * ($item['sale'] / 100), 0, ',', '.') }}
                                            </div>
                                        </div>

                                        <div class="section__product-info-button">
                                            <ul class="list-unstyled d-flex">
                                                <li class="section__product-info-item">
                                                    <a href="javascript:void(0)"
                                                        class="section__product-info-button-link text-uppercase">
                                                        Thêm vào giỏ
                                                    </a>
                                                </li>

                                                <li class="section__product-info-item">
                                                    <a href="javascript:void(0)" class="section__product-info-button-link">
                                                        <i class="ion-ios-heart-outline"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>

        <div class="section__product">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="section__border mb-4">
                            <h4 class="section__border-title text-capitalize">
                                Sản phẩm nối bật
                            </h4>
                        </div>
                    </div>
                </div>

                <!-- Swiper -->
                <div class="swiper-container swiper-product">
                    <div class="swiper-wrapper">
                        @foreach ($listProductFeatured as $item)
                            <div class="swiper-slide">
                                <div class="section__product-container">
                                    <div class="section__product-thumb position-relative">
                                        <a href="{{ route('userDetailProducts', $item['slug']) }}">
                                            <img src="{{ url('uploads/product/' . $item['thumb']) }}" class="img-fluid"
                                                alt="{{ $item['productName'] }}" />
                                        </a>

                                        @if ($item['sale'] > 0)
                                            <div class="section__product-sale">-{{ $item['sale'] }}%</div>
                                        @endif

                                        <span class="ion-search icons section__product-modal" data-toggle="modal"
                                            data-target="#dataModal"></span>
                                    </div>

                                    <div class="section__product-info">
                                        <div class="section__product-info-catalog">
                                            <a href="{{ route('userCatalogProducts', $item['catSlug']) }}">
                                                {{ $item['catName'] }} </a>
                                        </div>

                                        <div class="section__product-info-name">
                                            <a href="{{ route('userDetailProducts', $item['slug']) }}">
                                                {{ $item['productName'] }}
                                            </a>
                                        </div>

                                        <div class="section__product-info-star text-warning">
                                            <i class="ion-android-star"></i>
                                            <i class="ion-android-star"></i>
                                            <i class="ion-android-star"></i>
                                            <i class="ion-android-star"></i>
                                            <i class="ion-android-star"></i>
                                        </div>

                                        <div class="section__product-info-price d-flex flex-wrap">
                                            @if ($item['sale'] > 0)
                                                <div class="section__product-info-price-root">
                                                    {{ number_format($item['price'], 0, ',', '.') }}
                                                </div>
                                            @endif

                                            <div class="section__product-info-price-buy">
                                                {{ number_format($item['price'] - $item['price'] * ($item['sale'] / 100), 0, ',', '.') }}
                                            </div>
                                        </div>

                                        <div class="section__product-info-button">
                                            <ul class="list-unstyled d-flex">
                                                <li class="section__product-info-item">
                                                    <a href="javascript:void(0)"
                                                        class="section__product-info-button-link text-uppercase">
                                                        Thêm vào giỏ
                                                    </a>
                                                </li>

                                                <li class="section__product-info-item">
                                                    <a href="javascript:void(0)" class="section__product-info-button-link">
                                                        <i class="ion-ios-heart-outline"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>

        <div class="section__product">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="section__border mb-4">
                            <h4 class="section__border-title text-capitalize">
                                Sản phẩm nhiều lượt xem
                            </h4>
                        </div>
                    </div>
                </div>

                <!-- Swiper -->
                <div class="swiper-container swiper-product">
                    <div class="swiper-wrapper">
                        @foreach ($listProductMostView as $item)
                            <div class="swiper-slide">
                                <div class="section__product-container">
                                    <div class="section__product-thumb position-relative">
                                        <a href="{{ route('userDetailProducts', $item['slug']) }}">
                                            <img src="{{ url('uploads/product/' . $item['thumb']) }}" class="img-fluid"
                                                alt="{{ $item['productName'] }}" />
                                        </a>

                                        @if ($item['sale'] > 0)
                                            <div class="section__product-sale">-{{ $item['sale'] }}%</div>
                                        @endif

                                        <span class="ion-search icons section__product-modal" data-toggle="modal"
                                            data-target="#dataModal"></span>
                                    </div>

                                    <div class="section__product-info">
                                        <div class="section__product-info-catalog">
                                            <a href="{{ route('userCatalogProducts', $item['catSlug']) }}">
                                                {{ $item['catName'] }} </a>
                                        </div>

                                        <div class="section__product-info-name">
                                            <a href="{{ route('userDetailProducts', $item['slug']) }}">
                                                {{ $item['productName'] }}
                                            </a>
                                        </div>

                                        <div class="section__product-info-star text-warning">
                                            <i class="ion-android-star"></i>
                                            <i class="ion-android-star"></i>
                                            <i class="ion-android-star"></i>
                                            <i class="ion-android-star"></i>
                                            <i class="ion-android-star"></i>
                                        </div>

                                        <div class="section__product-info-price d-flex flex-wrap">
                                            @if ($item['sale'] > 0)
                                                <div class="section__product-info-price-root">
                                                    {{ number_format($item['price'], 0, ',', '.') }}
                                                </div>
                                            @endif

                                            <div class="section__product-info-price-buy">
                                                {{ number_format($item['price'] - $item['price'] * ($item['sale'] / 100), 0, ',', '.') }}
                                            </div>
                                        </div>

                                        <div class="section__product-info-button">
                                            <ul class="list-unstyled d-flex">
                                                <li class="section__product-info-item">
                                                    <a href="javascript:void(0)"
                                                        class="section__product-info-button-link text-uppercase">
                                                        Thêm vào giỏ
                                                    </a>
                                                </li>

                                                <li class="section__product-info-item">
                                                    <a href="javascript:void(0)" class="section__product-info-button-link">
                                                        <i class="ion-ios-heart-outline"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>

        @foreach ($listProductByCatName as $row)   

        @php
            $listCat = $mcatalog->catalogList($listCatalogGetid, $row['id'], [$row]);
            // $listProductByCatalog = $mproduct->where('trash', 1)
            // ->where('status', 1)
            // ->whereIn('cat_id', $listCat)
            // ->take(10)
            // ->orderBy('created_at', 'desc')
            // ->get()
            // ->toArray();
            
        @endphp

        <div class="section__product">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="section__border mb-4">
                            <h4 class="section__border-title text-capitalize">
                                {{ $row['name'] }}
                            </h4>
                        </div>
                    </div>
                </div>

                <!-- Swiper -->
                <div class="swiper-container swiper-product">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="section__product-container">
                                <div class="section__product-thumb position-relative">
                                    <a href="detail.html">
                                        <img src="images/7.jpg" class="img-fluid" alt="Product" />
                                    </a>

                                    <div class="section__product-sale">-50%</div>

                                    <span class="ion-search icons section__product-modal" data-toggle="modal"
                                        data-target="#dataModal"></span>
                                </div>

                                <div class="section__product-info">
                                    <div class="section__product-info-catalog">
                                        <a href="product.html"> Danh mục 1 </a>
                                    </div>

                                    <div class="section__product-info-name">
                                        <a href="detail.html">
                                            Sản phẩm 1 Sản phẩm 1 Sản phẩm 1 Sản phẩm 1 Sản phẩm 1
                                            Sản phẩm 1 Sản phẩm 1 Sản phẩm 1
                                        </a>
                                    </div>

                                    <div class="section__product-info-star text-warning">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>

                                    <div class="section__product-info-price d-flex flex-wrap">
                                        <div class="section__product-info-price-root">
                                            4.000.000
                                        </div>

                                        <div class="section__product-info-price-buy">
                                            2.000.000
                                        </div>
                                    </div>

                                    <div class="section__product-info-button">
                                        <ul class="list-unstyled d-flex">
                                            <li class="section__product-info-item">
                                                <a href="javascript:void(0)"
                                                    class="section__product-info-button-link text-uppercase">
                                                    Thêm vào giỏ
                                                </a>
                                            </li>

                                            <li class="section__product-info-item">
                                                <a href="javascript:void(0)" class="section__product-info-button-link">
                                                    <i class="ion-ios-heart-outline"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
        @endforeach
        
    </section>
    <!-- end  produt -->
@endsection

@section('linkAjax')
    <script>
        $(function() {
            // modal quickview
            $('.section__product-modal').on('click', function() {
                var id = $(this).attr('id');

                $.ajax({
                    url: "{{ route('userModalQuickView') }}",
                    type: "GET",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        $('#data').html(data);
                        $('#dataModal').modal('show');
                    }
                })
            })
        })

    </script>
@endsection
