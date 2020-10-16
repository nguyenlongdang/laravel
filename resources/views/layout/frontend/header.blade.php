<div class="container-fluid">
    <div class="row header__top">
        <div class="col-sm-6 d-flex justify-content-center justify-content-sm-start">
            <p class="text-capitalize header__top-welcome mb-2 mb-sm-0">
                Chào mừng bạn đến Rozer Store!
            </p>
        </div>

        <div class="col-sm-6 d-flex justify-content-center justify-content-sm-end">
            <div class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle header__top-link" type="button"
                    data-toggle="dropdown">TIện ích</a>
                <ul class="dropdown-menu m-0 shadow-sm header__top-dropdown">
                    <li class="">
                        <a href="login.html" class="header__top-dropdown-link">
                            Đăng nhập
                        </a>
                    </li>

                    <li>
                        <a href="register.html" class="header__top-dropdown-link">
                            Đăng ký
                        </a>
                    </li>
                </ul>
            </div>

            <div class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle header__top-link pr-sm-0" type="button"
                    data-toggle="dropdown">Ngôn ngữ</a>
                <ul class="dropdown-menu m-0 shadow-sm header__top-dropdown">
                    <li>
                        <a href="javascript:void(0)" class="header__top-dropdown-link">
                            English
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0)" class="header__top-dropdown-link">
                            Vietnamese
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end header top -->

    <div class="row header__mid d-flex align-items-center">
        <div class="col-md-3 col-6 order-md-0 order-0">
            <div class="header__mid-logo">
                <a href="{{ route('userHome') }}">
                    <img src="{{ url('') }}\images/logo.jpg" class="img-fluid" alt="Logo" />
                </a>
            </div>
        </div>

        <div class="col-md-6 col-12 order-md-1 order-2">
            <div class="header__mid-form position-relative mt-md-0 mt-4">
                <form action="">
                    <input type="text" class="form-control header__mid-input" />
                    <button type="submit" class="header__mid-btn">
                        <i class="ion-android-search icon" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="col-md-3 col-6 order-md-2 order-1 d-md-block d-none">
            <div class="header__mid-tools">
                <ul class="header__mid-tools-list list-unstyled d-flex justify-content-end">
                    <li class="header__mid-tools-item pr-3">
                        <a href="javascript:void(0)"
                            class="header__mid-tools-link text-dark position-relative header__mid-openWishlist">
                            <i class="ion-ios-heart-outline font-size"></i>
                            <span class="header__mid-tools-quantity">2</span>
                        </a>
                    </li>

                    <li class="header__mid-tools-item pl-3">
                        <a href="javascript:void(0)"
                            class="header__mid-tools-link text-dark position-relative header__mid-openCart">
                            <i class="ion-bag font-size"></i>
                            <span class="header__mid-tools-quantity">2</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-6 d-md-none d-block">
            <div class="header__mid-tools">
                <ul class="header__mid-tools-list list-unstyled d-flex justify-content-end">
                    <li class="header__mid-tools-item pr-3">
                        <a href="javascript:void(0)"
                            class="header__mid-tools-link text-dark position-relative header__mid-openWishlist">
                            <i class="ion-ios-heart-outline font-size"></i>
                            <span class="header__mid-tools-quantity">2</span>
                        </a>
                    </li>

                    <li class="header__mid-tools-item pl-3">
                        <a href="javascript:void(0)"
                            class="header__mid-tools-link text-dark position-relative header__mid-openCart">
                            <i class="ion-bag font-size"></i>
                            <span class="header__mid-tools-quantity">2</span>
                        </a>
                    </li>

                    <li class="header__mid-tools-item pl-4">
                        <a href="javascript:void(0)"
                            class="header__mid-tools-link text-dark header__mid-openNav">
                            <i class="ion-android-menu font-size"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end header mid -->
</div>

<div class="header__menu d-md-block d-none">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="d-flex justify-content-center list-unstyled">
                    <li class="header__menu-item">
                        <a href="{{ route('userHome') }}" class="header__menu-link"> Trang chủ </a>
                    </li>

                    <li class="header__menu-item">
                        <a href="product.html" class="header__menu-link">
                            Danh mục
                        </a>
                    </li>

                    <li class="header__menu-item">
                        <a href="post.html" class="header__menu-link"> Tin tức </a>
                    </li>

                    <li class="header__menu-item">
                        <a href="about.html" class="header__menu-link">
                            giới thiệu
                        </a>
                    </li>

                    <li class="header__menu-item">
                        <a href="contact.html" class="header__menu-link"> liên hệ </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end header menu -->