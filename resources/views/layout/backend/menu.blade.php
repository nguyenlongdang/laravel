<div data-simplebar="" class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Thống kê</li>

            <li>
                <a href="{{ route('adminDashboard') }}" class="waves-effect">
                    <i class="bx bx-home-circle"></i>
                    <span class="text-capitalize">Thống kê</span>
                </a>
            </li>

            <li class="menu-title">Quản lý sản phẩm</li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-file"></i>
                    <span class="text-capitalize">Danh mục</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('adminCatalogAdd') }} " class="text-capitalize">Thêm mới</a></li>
                    <li><a href="{{ route('adminCatalogIndex') }} " class="text-capitalize">Xem danh sách</a></li>
                    <li><a href="{{ route('adminCatalogRecycle') }} " class="text-capitalize">Xem thùng rác</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-file"></i>
                    <span class="text-capitalize">Thương hiệu</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('adminBrandAdd') }} " class="text-capitalize">Thêm mới</a></li>
                    <li><a href="{{ route('adminBrandIndex') }} " class="text-capitalize">Xem danh sách</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-file"></i>
                    <span class="text-capitalize">Nhà cung cấp</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('adminProducerAdd') }} " class="text-capitalize">Thêm mới</a></li>
                    <li><a href="{{ route('adminProducerIndex') }} " class="text-capitalize">Xem danh sách</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-file"></i>
                    <span class="text-capitalize">Sản phẩm</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('adminProductAdd') }} " class="text-capitalize">Thêm mới</a></li>
                    <li><a href="{{ route('adminProductIndex') }} " class="text-capitalize">Xem danh sách</a></li>
                    <li><a href="{{ route('adminProductRecycle') }} " class="text-capitalize">Xem thùng rác</a></li>
                </ul>
            </li>

            <li class="menu-title">Quản lý Slider</li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-file"></i>
                    <span class="text-capitalize">Slider</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('adminSliderAdd') }} " class="text-capitalize">Thêm mới</a></li>
                    <li><a href="{{ route('adminSliderIndex') }} " class="text-capitalize">Xem danh sách</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- Sidebar -->
</div>
