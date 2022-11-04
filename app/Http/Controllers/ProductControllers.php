<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Products;
use App\Models\Categories;
use App\Models\SizePros;
use App\Models\Sizes;

class ProductControllers extends Controller
{
    public function show()
    {
        $spham = Products::paginate(10);
        return view('admin_pages.products.index', compact('spham'));
    }

    public function addProductView()
    {
        $categories = Categories::all();
        $size = Sizes::all();
        return view('admin_pages.products.add', compact('size', 'categories'));
    }

    function checknameExists($name)
    {
        $check = Products::where('tensp', $name)->get();
        if ($check->count() > 0) {
            return true;
        }
        return false;
    }

    public function addProductHandle(Request $req)
    {
        //kiem tra du lieu dau vao
        $req->validate([
            'ProductName' => 'required|max:255',
            'ProductImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100000',
            'SellPrice' => 'required|integer|min:0',
            'Description' => 'required',
            'contenproduct' => 'required'
        ]);
        //them hinh anh
        $imageName = $this->uploadImage($req);
        $newPro = new Products();
        $newPro->slug = Str::slug($req->ProductName);
        $newPro->tensp = $req->ProductName;
        $newPro->giaban = $req->SellPrice;
        $newPro->hinhanh = $imageName;
        $newPro->mota = $req->Description;
        $newPro->noidung = $req->contenproduct;
        $newPro->id_loaisanpham = $req->select_cat;

        if ($this->checknameExists($req->ProductName)) {
            return redirect(route('products.addview'))->with("error_nameexists", "Tên sản phẩm đã tồn tại!");
        } else {
            $newPro->save();
        }
        $getPro = Products::all()->sortByDesc('id')->first();
        $choose = array();
        if ($req->sizePro != null) {
            $choose = array(1, 3);
        } else {
            $choose = array(1);
        }
        $idProLast = $getPro->id;

        foreach ($choose as $ch) {
            $newSizePro = new SizePros();
            $newSizePro->id_pro = $idProLast;
            $newSizePro->id_size = $ch;
            $newSizePro->save();
        }
        session()->put('success_add_pro', "Thêm thành công");
        return redirect('admin/san-pham');
    }
    public function uploadImage($req)
    {
        $imageName = "";
        $images = $req->file('ProductImage');
        if ($req->hasFile('ProductImage')) {
            $images = $req->file('ProductImage');
            $imageName = time() . '.' . $images->extension();
            $images->move(public_path('uploads/product/'), $imageName);
        }
        return $imageName;
    }

    public function deleteProduct($id)
    {
        $delProduct = Products::where('id', $id)->first();
        $image_path = "uploads/product/" . $delProduct->hinh_anh;
        if (file_exists($image_path)) {
            @unlink(public_path($image_path));
        }

        $delProduct->size()->detach([1, 3]);
        $delProduct->delete();
        session()->put('success_del_pro', true);
        return redirect()->back();
    }

    public function editProductView($slug)
    {
        $catetype = Categories::all();
        $spham = Products::where('slug', $slug)->first();
        return view('admin_pages.products.edit', compact('spham', 'catetype'));
    }

    //update product
    public function updateProduct(Request $req)
    {
        $req->validate([
            'ten_spham' => 'required|max:255',
            'giaban' => 'required|integer|min:0',
            'conten_edit' => 'required',
            'description_edit' => 'required'
        ]);

        $editProduct = Products::find($req->id);
        $editProduct->tensp = $req->ten_spham;
        $editProduct->giaban = $req->giaban;
        $editProduct->mota = $req->description_edit;
        $editProduct->noidung = $req->conten_edit;
        $editProduct->id_loaisanpham = $req->select_cat;
        $editProduct->trangthai = $req->status_product;

        if ($req->ProductImage != null) {
            $imageName = $this->uploadImage($req);
        } else {
            $imageName = $req->imageOld;
        }

        $editProduct->hinhanh = $imageName;
        session()->put('success_edit_pro', true);
        $editProduct->save();
        return redirect('admin/san-pham');
    }

    public function updateStatus(Request $req)
    {
        $getData = Products::find($req->id);
        $statusP = $getData->trangthai;
        $newStatus = 0;
        if (+$statusP === 1) {
            $newStatus = 0;
        } else {
            $newStatus = 1;
        }
        $getData->trangthai = $newStatus;
        $getData->save();
        return response()->json([
            "data" => $req->id,
        ]);
    }


}
