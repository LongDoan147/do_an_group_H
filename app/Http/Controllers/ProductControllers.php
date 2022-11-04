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

}
