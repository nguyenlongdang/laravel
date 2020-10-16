<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mproduct;

class ProductsController extends Controller
{
    public function detail(Request $request)
    {
        $slug = $request->segment(2);
        $row = Mproduct::where('status', 1)
        ->where('trash', 1)
        ->where('slug', $slug)
        ->first();
        
        if(!$row) {
            return view('backend.error');
        }
        
        $data['listProductRelated'] = Mproduct::where('product.status', 1)
        ->where('product.trash', 1)
        ->where('product.catid', $row['catid'])
        ->where('product.id', '!=', $row['id'])
        ->join('catalog', 'product.catid', '=', 'catalog.id')
        ->orderBy('product.created_at', 'desc')
        ->take(10)
        ->select('product.name as productName', 'product.slug', 'product.thumb', 'product.sale', 'product.price', 'product.catid', 'catalog.name as catName', 'catalog.slug as catSlug')
        ->get();

        $data['thumbList'] = explode(',', $row['thumb_list']);     
        $data['row'] = $row;
        return view('frontend.product.detail', $data);
    }
}
