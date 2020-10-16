<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Mcatalog;

class CatalogController extends Controller
{
    public function index()
    {
        $mcatalog = new Mcatalog;
        $data['no'] = 1;
        $data['list'] = $mcatalog->where('trash', 1)->orderBy('created_at', 'desc')->get();
        $data['listRecycleCount'] = $mcatalog->where('trash', 0)->count();
        return view('backend.catalog.index', $data);
    }

    public function recycle()
    {
        $mcatalog = new Mcatalog;
        $data['no'] = 1;
        $data['list'] = $mcatalog->where('trash', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.catalog.recycle', $data);
    }

    public function add()
    {
        $mcatalog = new Mcatalog;
        $data['categories'] =  $mcatalog->treeList();
        return view('backend.catalog.add', $data);
    }

    public function postAdd(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:3|max:50|unique:catalog,slug',
                'thumb' => 'file|mimes:jpg,jpeg,png,gif',
                'meta_title' => 'required|max:150',
                'meta_keyword' => 'required|max:150',
                'meta_description' => 'required'
            ],
            [
                'name.required' => 'Tên danh mục không được bỏ trống.',
                'name.min' => 'Tên danh mục không được ít hơn 3 kí tự.',
                'name.max' => 'Tên danh mục không được vượt quá 50 kí tự.',
                'thumb.mimes' => 'Tệp vừa chọn không phải là hình ảnh.',
                'meta_title.required' => 'Meta Title (SEO) không được bỏ trống.',
                'meta_title.max' => 'Meta Title (SEO) không được vượt quá 150 kí tự.',
                'meta_keyword.required' => 'Meta Keyword (SEO) không được bỏ trống.',
                'meta_keyword.max' => 'Meta Keyword (SEO) không được vượt quá 150 kí tự.',
                'meta_description.required' => 'Meta Description (SEO) không được bỏ trống.',
            ]
        );

        if ($request->hasFile('thumb')) {
            $destinationPath = 'uploads/catalog/';
            $profileImage = date('YmdHis') . "." . $request->file('thumb')->getClientOriginalExtension();
            $request->file('thumb')->move($destinationPath, $profileImage);
        } else {
            $profileImage = 'default.jpg';
        }

        $mcatalog = new Mcatalog;
        $checkSlug = $mcatalog->where('slug', Str::slug($request->name, '-'))->count();
        if($checkSlug > 0) {
            $request->session()->flash('error', 'Danh mục này đã tồn tại!');
        } else {
            $mcatalog->name = $request->name;
            $mcatalog->slug = Str::slug($request->name, '-');
            $mcatalog->parent_id = $request->parent_id;
            $mcatalog->thumb = $profileImage;
            $mcatalog->status = 1;
            $mcatalog->trash = 1;
            $mcatalog->meta_title = $request->meta_title;
            $mcatalog->meta_keyword = $request->meta_keyword;
            $mcatalog->meta_description = $request->meta_description;
            $mcatalog->save();
            $request->session()->flash('success', 'Thêm thành công danh mục sản phẩm!');
        }
        return redirect()->route('adminCatalogIndex');
    }

    public function edit($id)
    {
        $mcatalog = new Mcatalog;
        $row = $mcatalog->find($id);
        $data['row'] = $row;
        if(!$row) {
            return view('backend.error');
        }
        $data['categories'] =  $mcatalog->treeList();
        return view('backend.catalog.edit', $data);
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:3|max:50',
                'thumb' => 'file|mimes:jpg,jpeg,png,gif',
                'meta_title' => 'required|max:150',
                'meta_keyword' => 'required|max:150',
                'meta_description' => 'required'
            ],
            [
                'name.required' => 'Tên danh mục không được bỏ trống.',
                'name.min' => 'Tên danh mục không được ít hơn 3 kí tự.',
                'name.max' => 'Tên danh mục không được vượt quá 50 kí tự.',
                'thumb.mimes' => 'Tệp vừa chọn không phải là hình ảnh.',
                'meta_title.required' => 'Meta Title (SEO) không được bỏ trống.',
                'meta_title.max' => 'Meta Title (SEO) không được vượt quá 150 kí tự.',
                'meta_keyword.required' => 'Meta Keyword (SEO) không được bỏ trống.',
                'meta_keyword.max' => 'Meta Keyword (SEO) không được vượt quá 150 kí tự.',
                'meta_description.required' => 'Meta Description (SEO) không được bỏ trống.',
            ]
        );

        $mcatalog = new Mcatalog;
        $mcatalog = $mcatalog->find($id);
        $row =  $mcatalog->find($id);

        if ($request->hasFile('thumb')) {
            $destinationPath = 'uploads/catalog/';
            $profileImage = date('YmdHis') . "." . $request->file('thumb')->getClientOriginalExtension();
            $request->file('thumb')->move($destinationPath, $profileImage);
            if ($row['thumb'] != 'default.jpg') {
                unlink('uploads/catalog/' . $request->thumbOld);
            }
        } else {
            $profileImage = $request->thumbOld;
        }

        $mcatalog->name = $request->name;
        $mcatalog->slug = Str::slug($request->name, '-');
        $mcatalog->parent_id = $request->parent_id;
        $mcatalog->thumb = $profileImage;
        $mcatalog->meta_title = $request->meta_title;
        $mcatalog->meta_keyword = $request->meta_keyword;
        $mcatalog->meta_description = $request->meta_description;
        $mcatalog->save();
        $request->session()->flash('success', 'Cập nhật thành công danh mục sản phẩm!');
        return redirect()->route('adminCatalogIndex');
    }

    public function status(Request $request, $id) 
    {
        $mcatalog = new Mcatalog;
        $mcatalog = $mcatalog->find($id);
        $row =  $mcatalog->find($id);
        if(!$row) {
            return view('backend.error');
        }
        if($row['status'] == 1) {
            $mcatalog->status = 0;
            $mcatalog->save();
            $request->session()->flash('success', 'Trạng thái của danh mục ' . $row['name'] . ' đã được ẩn.');
        } else {
            $mcatalog->status = 1;
            $mcatalog->save();
            $request->session()->flash('success', 'Trạng thái của danh mục ' . $row['name'] . ' đã được hiển thị.');
        }
        return redirect()->route('adminCatalogIndex');
    }

    public function restore(Request $request, $id) 
    {
        $mcatalog = new Mcatalog;
        $mcatalog = $mcatalog->find($id);
        $row =  $mcatalog->find($id);
        if(!$row) {
            return view('backend.error');
        }
        if($row['trash'] == 0) {
            $mcatalog->trash = 1;
            $mcatalog->save();
            $request->session()->flash('success', 'Danh mục ' . $row['name'] . ' đã được khôi phục.');
        } 
        return redirect()->route('adminCatalogRecycle');
    }

    public function trash(Request $request, $id) 
    {
        $mcatalog = new Mcatalog;
        $mcatalog = $mcatalog->find($id);
        $row =  $mcatalog->find($id);
        if(!$row) {
            return view('backend.error');
        }

        $children = $mcatalog->where('parent_id', $row['id'])->where('trash', 1)->count();
        if($children == 0) {
            $mcatalog->trash = 0;
            $mcatalog->save();
            $request->session()->flash('success', 'Danh mục ' . $row['name'] . ' đã được đưa vào thùng rác.');
        } else {
            $request->session()->flash('error', 'Danh mục ' . $row['name'] . ' vẫn còn danh mục con khác bên trong. Vui lòng xóa danh mục con trước.');
        }
        return redirect()->route('adminCatalogIndex');
    }

    public function delete(Request $request, $id)
    {
        $mcatalog = new Mcatalog;
        $mcatalog = $mcatalog->find($id);
        $row =  $mcatalog->find($id);
        if(!$row) {
            return view('backend.error');
        }
        $mcatalog->delete();
        $request->session()->flash('success', 'Danh mục ' . $row['name'] . ' đã được xóa vĩnh viễn.');
        if ($row['thumb'] != 'default.jpg') {
            unlink('uploads/catalog/' . $row['thumb']);
        }
        return redirect()->route('adminCatalogRecycle');
    }
}
