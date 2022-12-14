<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class Categoriesontroller extends Controller
{
    public function index()
    {
        $getCat = Categories::all();
        return view('admin_pages.category.index', compact('getCat'));
    }
    //add categories
    public function add()
    {
        return view('admin_pages.category.add');
    }
    public function addhandle(Request $request)
    {

        $nameImage = $this->uploadImage($request);
        $newCategory = new Categories();
        $newCategory->tenloai = $request->namecategory;
        $newCategory->mota = $request->descriptioncategory;
        $newCategory->hinhanh = $nameImage;
        $newCategory->slug = Str::slug($request->namecategory);

        if ($this->checkName(Str::slug($request->namecategory))) {
            return redirect('admin/category-add');
        }
        $newCategory->save();
        $getCat = Categories::all();
        return view('admin_pages.category.index', compact('getCat'));
    }
    public function uploadImage($req)
    {
        $imageName = "";
        $images = $req->file('categoriesIMG');
        if ($req->hasFile('categoriesIMG')) {
            $images = $req->file('categoriesIMG');
            $imageName = time() . '.' . $images->extension();
            $images->move(public_path('uploads/categories/'), $imageName);
        }
        return $imageName;
    }
    public function checkName($slug)
    {
        $mal = Categories::where('slug', $slug)->get('slug');
        $checkName = "";
        foreach ($mal as $m) {
            $checkName = $m->slug;
        }
        if ($slug == $checkName) {
            return true;
        }
        return false;
    }
        //delete
    function deletecat($id)
    {
        $delCat = Categories::find($id);
        $delCat->delete();
        return redirect('admin/category');
    }
    // edit
    public function edit($slug)
    {
        $editCat = Categories::where('slug', $slug)->first();
        return view('admin_pages.category.edit', compact('editCat'));
    }
    //save edit
    function update(Request $req)
    {
        $id = $req->id_cat;
        $updateCat = Categories::where('id', $id)->first();
        $nameImage = "";
        $updateCat->tenloai = $req->categoryname_edit;
        $updateCat->mota = $req->des_edit;
        if ($req->categoryImage == null) {
            $nameImage = $req->oldname;
        }else{
            $nameImage = $req->categoryImage;
        }
        $updateCat->save();
        $getCat = Categories::all();
        return view('admin_pages.category.index', compact('getCat'));
    }
    public function activeCategory($id)
    {
        $categori = Categories::find($id);
        $categori->trangthai = +!$categori->trangthai;
        $categori->save();
        return redirect()->back()->with('message', '???? c???p nh???t th??nh c??ng.');
    }
}
