<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mslider;
use App\Models\Mproduct;
use App\Models\Mcatalog;

use App\Library\Categories;

class HomeController extends Controller
{
    public function index()
    {
        // slider
        $data['listSlider'] = Mslider::where('status', 1)
            ->take(10)
            ->select('name', 'thumb')
            ->get();

        // catalog
        $data['listCatalog'] = Mcatalog::where('status', 1)
            ->where('trash', 1)
            ->where('parent_id', '!=', 0)
            ->orderBy('created_at', 'asc')
            ->take(10)
            ->select('name', 'parent_id', 'thumb', 'slug')
            ->get();

        // product
        $data['listProductNews'] = Mproduct::where('product.status', 1)
            ->where('product.trash', 1)
            ->where('product.featured', 0)
            ->join('catalog', 'product.catid', '=', 'catalog.id')
            ->orderBy('product.created_at', 'desc')
            ->take(10)
            ->select('product.name as productName', 'product.slug', 'product.thumb', 'product.sale', 'product.price', 'product.catid', 'catalog.name as catName', 'catalog.slug as catSlug', 'product.id')
            ->get();

        $data['listProductFeatured'] = Mproduct::where('product.status', 1)
            ->where('product.trash', 1)
            ->where('product.featured', 1)
            ->join('catalog', 'product.catid', '=', 'catalog.id')
            ->take(10)
            ->orderBy('product.created_at', 'desc')
            ->select('product.name as productName', 'product.slug', 'product.thumb', 'product.sale', 'product.price', 'product.catid', 'catalog.name as catName', 'catalog.slug as catSlug')
            ->get();

        $data['listProductMostView'] = Mproduct::where('product.status', 1)
            ->where('product.trash', 1)
            ->join('catalog', 'product.catid', '=', 'catalog.id')
            ->orderBy('product.view', 'desc')
            ->take(10)
            ->select('product.name as productName', 'product.slug', 'product.thumb', 'product.sale', 'product.price', 'product.catid', 'catalog.name as catName', 'catalog.slug as catSlug')
            ->get();

        // product by catalog
        $data['listProductByCatName'] = Mcatalog::where('status', 1)
            ->where('trash', 1)
            ->where('parent_id', 0)
            ->orderBy('created_at', 'asc')
            ->take(5)
            ->select('name', 'id', 'parent_id')
            ->get();

        $data['listCatalogGetid'] = Mcatalog::where('status', 1)
            ->where('trash', 1)
            ->orderBy('created_at', 'asc')
            ->select('id', 'parent_id')
            ->get();

        $data['Categories'] = new Categories;
        $data['mcatalog'] = new Mcatalog;
        $data['mproduct'] = new Mproduct;
        return view('frontend.home.index', $data);
    }

    public function modal(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            if (isset($id) && !empty($id)) {
                $listProductModal = Mproduct::where('status', 1)
                    ->where('trash', 1)
                    ->where('id', $id)
                    ->get();

                $html = '';

                foreach ($listProductModal as $item) {
                    $thumbList = explode(',', $item['thumb_list']);

                    $html .= '<div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper">';

                    $html .= '<div class="swiper-slide">
                                <img class="img-fluid" src="' . url('uploads/product/' . $item['thumb']) . '" alt="' . $item['name'] . '" />
                            </div>';

                    foreach ($thumbList as $img) {
                        $html .= '<div class="swiper-slide">
                                <img class="img-fluid" src="' . url('uploads/product/' . $img) . '" alt="' . $item['name'] . '" />
                            </div>';
                    }
                    $html .= ' </div>
                        </div>
                        <div class="swiper-container gallery-thumbs mt-3">
                            <div class="swiper-wrapper">';
                    $html .= '<div class="swiper-slide">
                            <img class="img-fluid" src="' . url('uploads/product/' . $item['thumb']) . '" alt="' . $item['name'] . '" />
                        </div>';

                    foreach ($thumbList as $img) {
                        $html .= '<div class="swiper-slide">
                            <img class="img-fluid" src="' . url('uploads/product/' . $img) . '" alt="' . $item['name'] . '" />
                        </div>';
                    }

                    $html .= '</div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="modal__info mt-3 mt-md-0">
                            <h2>' . $item['name'] . '</h2>
                            <div class="modal__info-star">
                                <div class="text-warning">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                </div>
                            </div>
                            <div class="modal__price">
                                <ul class="list-unstyled">
                                    <li class="modal__price-root">' . number_format($item['price'] - $item['price'] * ($item['sale'] / 100), 0, ',', '.') . ' VNĐ</li>';

                    if ($item['sale'] > 0) {
                        $html .= '<li class="modal__price-buy">' . number_format($item['price'], 0, ',', '.') . ' VNĐ</li>';
                    }
                    $html .= '</ul>
                            </div>
                            <p class="modal_desc">
                            ' . $item['intro_desc'] . '
                            </p>
        
                            <div class="modal__btn">
                                <a href="javascript:void(0)" class="modal__btn-add text-uppercase">
                                    Thêm vào giỏ
                                </a>
        
                                <a href="javascript:void(0)" class="modal__btn-add text-capitalize">
                                    <i class="ion-ios-heart-outline"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>';
                }

                echo $html;
            }
        }
    }
}
