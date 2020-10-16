@extends('layout.frontend.layout')

@section('metaSeo')
<meta name="title" content="{{ $row['meta_title'] }}">
<meta name="keywords" content="{{ $row['meta_keyword'] }}"> 
<meta name="description" content="{{ $row['meta_description'] }}">
<meta property="og:title" content="{{ $row['meta_title'] }}">
<meta property="og:keywords" content="{{ $row['meta_keyword'] }}">
<meta property="og:description" content="{{ $row['meta_description'] }}">
@endsection

@section('title')
{{ $row['name'] }}
@endsection

@section('content')
   <!-- breadcrumb -->
   <section class="section">
    <div class="section__breadcrumbs">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <ul class="list-unstyled d-flex flex-wrap">
              <li class="section__breadcrumbs-item">
                <a
                  href="index.html"
                  class="section__breadcrumbs-link text-capitalize"
                >
                  Trang chủ
                </a>
              </li>

              <li class="section__breadcrumbs-item">
                <a
                  href="product.html"
                  class="section__breadcrumbs-link text-capitalize"
                >
                  Danh mục 1
                </a>
              </li>

              <li class="section__breadcrumbs-item">
                <a
                  href="product.html"
                  class="section__breadcrumbs-link text-capitalize"
                >
                  Danh mục 2
                </a>
              </li>

              <li class="section__breadcrumbs-item text-capitalize">
                {{ $row['name'] }}
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end breadcrumb -->

  <!-- detail -->
  <section class="section">
    <div class="section__detail">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <div class="section__detail-gallery">
              <!-- Swiper -->
              <div class="swiper-container gallery-top1 mb-4">
                <div class="swiper-wrapper">

                  <div class="swiper-slide border text-center">
                    <img
                      src="{{ url('uploads/product/' . $row['thumb']) }}"
                      class="img-fluid venobox"
                      data-gall="gall1"
                      title="{{ $row['name'] }}"
                      href="{{ url('uploads/product/' . $row['thumb']) }}"
                      alt="{{ $row['name'] }}"
                    />
                  </div>

                  @foreach ($thumbList as $img)
                      <div class="swiper-slide border text-center">
                    <img
                      src="{{ url('uploads/product/' . $img) }}"
                      class="img-fluid venobox"
                      data-gall="gall1"
                      title="{{ $row['name'] }}"
                      href="{{ url('uploads/product/' . $img) }}"
                      alt="{{ $row['name'] }}"
                    />
                  </div>
                  @endforeach            

                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
              </div>
              <div class="swiper-container gallery-thumbs1">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <img
                      src="{{ url('uploads/product/' . $row['thumb']) }}"
                      class="img-fluid"
                      alt="{{ $row['name'] }}"
                    />
                  </div>
                  @foreach ($thumbList as $img)
                      <div class="swiper-slide">
                    <img
                      src="{{ url('uploads/product/' . $img) }}"
                      class="img-fluid"
                      alt="{{ $row['name'] }}"
                    />
                  </div>
                  @endforeach
                  
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-12">
            <div class="section__detail-info mt-4 mt-lg-0">
              <div class="section__detail-info-name">
                <h4>{{ $row['name'] }}</h4>
              </div>

              <div class="section__detail-info-star mt-2">
                <div class="text-warning">
                  <i class="ion-android-star"></i>
                  <i class="ion-android-star"></i>
                  <i class="ion-android-star"></i>
                  <i class="ion-android-star"></i>
                  <i class="ion-android-star"></i>
                </div>
              </div>

              <div class="section__detail-info-price">
                @if ($row['sale'] > 0)
                <div class="section__detail-info-price-root">
                  {{ number_format($row['price'], 0, ',', '.') }} VNĐ
                </div>
                @endif
                <div class="d-flex align-items-center">
                  <div class="section__detail-info-price-buy mr-4">
                    {{ number_format(($row['price'] - ($row['price'] * ($row['sale'] / 100))), 0, ',', '.') }} VNĐ
                  </div>

                  @if ($row['sale'] > 0)
                      <div class="section__detail-info-price-sale">- {{ $row['sale'] }} %</div>
                  @endif
                  
                </div>
              </div>

              <div class="section__detail-info-intro border-bottom pb-4">
                <p class="text-muted">
                  {{ $row['intro_desc'] }}
                </p>
              </div>

              <div class="section__detail-info-btn pt-4 border-bottom pb-4">
                <a
                  href="javascript:void(0)"
                  class="section__detail-info-btn-addCart btn"
                  >Thêm vào giỏ hàng</a
                >
                <a
                  href="javascript:void(0)"
                  class="section__detail-info-btn-addWishlist btn"
                  >Yêu thích</a
                >
              </div>

              <div class="section__detail-info-policy pt-4">
                <ul class="list-unstyled">
                  <li class="section__detail-info-item">
                    <img
                      src="{{ url('') }}/images/policy.png"
                      class="img-fluid"
                      alt="Policy"
                    />
                    <span class="text-capitalize pl-2"
                      >Chính sách bảo mật</span
                    >
                  </li>
                  <li class="section__detail-info-item">
                    <img
                      src="{{ url('') }}/images/policy-2.png"
                      class="img-fluid"
                      alt="Policy"
                    />
                    <span class="text-capitalize pl-2"
                      >Chính sách vận chuyển</span
                    >
                  </li>
                  <li class="section__detail-info-item">
                    <img
                      src="{{ url('') }}/images/policy-3.png"
                      class="img-fluid"
                      alt="Policy"
                    />
                    <span class="text-capitalize pl-2"
                      >Chính sách trả hàng</span
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section__tabs">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <ul class="nav justify-content-center section__tabs-list">
              <li class="nav-item">
                <a
                  class="section__tabs-link active"
                  data-toggle="tab"
                  href="#description"
                >
                  Chi tiết sản phẩm
                </a>
              </li>
              <li class="nav-item">
                <a
                  class="section__tabs-link"
                  data-toggle="tab"
                  href="#review"
                >
                  Đánh giá
                </a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="description">
                <div class="section__tabs-detail border py-5 px-4">
                  {!! $row['detail_desc'] !!}
                </div>
              </div>
              <div class="tab-pane fade" id="review">
                <div class="section__tab-review border py-5 px-4">
                  <div class="row">
                    <div class="col-lg-7">
                      <div class="section__review-tabs-wrapper">
                        <div
                          class="section__tabs-review-single d-flex mb-4 align-items-center"
                        >
                          <div class="section__tabs-review-thumb mr-4">
                            <img
                              src="images/fb.jpg"
                              class="img-fluid rounded-circle"
                              alt="Images"
                            />
                          </div>
                          <div class="section__tabs-review-content">
                            <div class="section__tabs-review-body mb-3">
                              <div class="d-flex">
                                <div class="section__tabs-review-name">
                                  <h4 class="text-capitalize">
                                    Nguyễn Long Đăng
                                  </h4>
                                </div>
                                <div class="text-warning ml-4">
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                </div>
                              </div>
                            </div>
                            <div class="section__tabs-review-all">
                              <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Eius inventore distinctio
                                molestiae quisquam veniam aliquam repudiandae
                                accusamus laudantium vel nihil, modi,
                                aspernatur, pariatur laboriosam! Minus
                                excepturi corrupti saepe nobis velit!
                              </p>
                            </div>
                          </div>
                        </div>

                        <div
                          class="section__tabs-review-single d-flex mb-4 align-items-center children"
                        >
                          <div class="section__tabs-review-thumb mr-4">
                            <img
                              src="images/fb.jpg"
                              class="img-fluid rounded-circle"
                              alt="Images"
                            />
                          </div>
                          <div class="section__tabs-review-content">
                            <div class="section__tabs-review-body mb-3">
                              <div class="d-flex">
                                <div class="section__tabs-review-name">
                                  <h4 class="text-capitalize">
                                    Nguyễn Long Đăng
                                  </h4>
                                </div>
                                <div class="text-warning ml-4">
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                </div>
                              </div>
                            </div>
                            <div class="section__tabs-review-all">
                              <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Eius inventore distinctio
                                molestiae quisquam veniam aliquam repudiandae
                                accusamus laudantium vel nihil, modi,
                                aspernatur, pariatur laboriosam! Minus
                                excepturi corrupti saepe nobis velit!
                              </p>
                            </div>
                          </div>
                        </div>

                        <div
                          class="section__tabs-review-single d-flex mb-4 align-items-center children"
                        >
                          <div class="section__tabs-review-thumb mr-4">
                            <img
                              src="images/fb.jpg"
                              class="img-fluid rounded-circle"
                              alt="Images"
                            />
                          </div>
                          <div class="section__tabs-review-content">
                            <div class="section__tabs-review-body mb-3">
                              <div class="d-flex">
                                <div class="section__tabs-review-name">
                                  <h4 class="text-capitalize">
                                    Nguyễn Long Đăng
                                  </h4>
                                </div>
                                <div class="text-warning ml-4">
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                </div>
                              </div>
                            </div>
                            <div class="section__tabs-review-all">
                              <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Eius inventore distinctio
                                molestiae quisquam veniam aliquam repudiandae
                                accusamus laudantium vel nihil, modi,
                                aspernatur, pariatur laboriosam! Minus
                                excepturi corrupti saepe nobis velit!
                              </p>
                            </div>
                          </div>
                        </div>

                        <div
                          class="section__tabs-review-single d-flex mb-4 align-items-center children"
                        >
                          <div class="section__tabs-review-thumb mr-4">
                            <img
                              src="images/fb.jpg"
                              class="img-fluid rounded-circle"
                              alt="Images"
                            />
                          </div>
                          <div class="section__tabs-review-content">
                            <div class="section__tabs-review-body mb-3">
                              <div class="d-flex">
                                <div class="section__tabs-review-name">
                                  <h4 class="text-capitalize">
                                    Nguyễn Long Đăng
                                  </h4>
                                </div>
                                <div class="text-warning ml-4">
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                </div>
                              </div>
                            </div>
                            <div class="section__tabs-review-all">
                              <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Eius inventore distinctio
                                molestiae quisquam veniam aliquam repudiandae
                                accusamus laudantium vel nihil, modi,
                                aspernatur, pariatur laboriosam! Minus
                                excepturi corrupti saepe nobis velit!
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="section__review-tabs-wrapper">
                        <div
                          class="section__tabs-review-single d-flex mb-4 align-items-center"
                        >
                          <div class="section__tabs-review-thumb mr-4">
                            <img
                              src="images/fb.jpg"
                              class="img-fluid rounded-circle"
                              alt="Images"
                            />
                          </div>
                          <div class="section__tabs-review-content">
                            <div class="section__tabs-review-body mb-3">
                              <div class="d-flex">
                                <div class="section__tabs-review-name">
                                  <h4 class="text-capitalize">
                                    Nguyễn Long Đăng
                                  </h4>
                                </div>
                                <div class="text-warning ml-4">
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                </div>
                              </div>
                            </div>
                            <div class="section__tabs-review-all">
                              <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Eius inventore distinctio
                                molestiae quisquam veniam aliquam repudiandae
                                accusamus laudantium vel nihil, modi,
                                aspernatur, pariatur laboriosam! Minus
                                excepturi corrupti saepe nobis velit!
                              </p>
                            </div>
                          </div>
                        </div>

                        <div
                          class="section__tabs-review-single d-flex mb-4 align-items-center children"
                        >
                          <div class="section__tabs-review-thumb mr-4">
                            <img
                              src="images/fb.jpg"
                              class="img-fluid rounded-circle"
                              alt="Images"
                            />
                          </div>
                          <div class="section__tabs-review-content">
                            <div class="section__tabs-review-body mb-3">
                              <div class="d-flex">
                                <div class="section__tabs-review-name">
                                  <h4 class="text-capitalize">
                                    Nguyễn Long Đăng
                                  </h4>
                                </div>
                                <div class="text-warning ml-4">
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                </div>
                              </div>
                            </div>
                            <div class="section__tabs-review-all">
                              <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Eius inventore distinctio
                                molestiae quisquam veniam aliquam repudiandae
                                accusamus laudantium vel nihil, modi,
                                aspernatur, pariatur laboriosam! Minus
                                excepturi corrupti saepe nobis velit!
                              </p>
                            </div>
                          </div>
                        </div>

                        <div
                          class="section__tabs-review-single d-flex mb-4 align-items-center children"
                        >
                          <div class="section__tabs-review-thumb mr-4">
                            <img
                              src="images/fb.jpg"
                              class="img-fluid rounded-circle"
                              alt="Images"
                            />
                          </div>
                          <div class="section__tabs-review-content">
                            <div class="section__tabs-review-body mb-3">
                              <div class="d-flex">
                                <div class="section__tabs-review-name">
                                  <h4 class="text-capitalize">
                                    Nguyễn Long Đăng
                                  </h4>
                                </div>
                                <div class="text-warning ml-4">
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                </div>
                              </div>
                            </div>
                            <div class="section__tabs-review-all">
                              <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Eius inventore distinctio
                                molestiae quisquam veniam aliquam repudiandae
                                accusamus laudantium vel nihil, modi,
                                aspernatur, pariatur laboriosam! Minus
                                excepturi corrupti saepe nobis velit!
                              </p>
                            </div>
                          </div>
                        </div>

                        <div
                          class="section__tabs-review-single d-flex mb-4 align-items-center children"
                        >
                          <div class="section__tabs-review-thumb mr-4">
                            <img
                              src="images/fb.jpg"
                              class="img-fluid rounded-circle"
                              alt="Images"
                            />
                          </div>
                          <div class="section__tabs-review-content">
                            <div class="section__tabs-review-body mb-3">
                              <div class="d-flex">
                                <div class="section__tabs-review-name">
                                  <h4 class="text-capitalize">
                                    Nguyễn Long Đăng
                                  </h4>
                                </div>
                                <div class="text-warning ml-4">
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                  <i class="ion-android-star"></i>
                                </div>
                              </div>
                            </div>
                            <div class="section__tabs-review-all">
                              <p>
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Eius inventore distinctio
                                molestiae quisquam veniam aliquam repudiandae
                                accusamus laudantium vel nihil, modi,
                                aspernatur, pariatur laboriosam! Minus
                                excepturi corrupti saepe nobis velit!
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-5">
                      <form action="">
                        <div class="form-group">
                          <label class="text-capitalize">Nội dung</label>
                          <textarea class="form-control" name="" id="" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="section__tabs-review-btn">Gửi</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end detail -->

  @if (count($listProductRelated))
  <!-- related -->
  <section class="section">
    <div class="section__product">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="section__border mb-4">
              <h4 class="section__border-title text-capitalize">
                Sản phẩm cùng danh mục
              </h4>
            </div>
          </div>
        </div>

        <!-- Swiper -->
        <div class="swiper-container swiper-product">
          <div class="swiper-wrapper">
            
                @foreach ($listProductRelated as $item)
            <div class="swiper-slide">
                <div class="section__product-container">
                    <div class="section__product-thumb position-relative">
                        <a href="{{ route('userDetailProducts', $item['slug']) }}">
                            <img src="{{ url('uploads/product/' . $item['thumb']) }}" class="img-fluid" alt="{{ $item['productName'] }}" />
                        </a>

                        @if ($item['sale'] > 0)
                             <div class="section__product-sale">-{{ $item['sale'] }}%</div>
                        @endif                       

                        <span class="ion-search icons section__product-modal" data-toggle="modal"
                            data-target="#dataModal"></span>
                    </div>

                    <div class="section__product-info">
                        <div class="section__product-info-catalog">
                            <a href="{{ route('userCatalogProducts', $item['catSlug']) }}"> {{ $item['catName'] }} </a>
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
                                {{ number_format(($item['price'] - ($item['price'] * ($item['sale'] / 100))), 0, ',', '.') }}
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

  </section>
  @endif
  <!-- end related -->
@endsection
