<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = ['tensp', 'slug', 'mota', 'hinhanh', 'noidung', 'giaban', 'id_loaisanpham', 'trangthai'];
    public function danhmuc()
    {
        return $this->belongsTo(Categories::class, 'id_loaisanpham');
    }

    public function size()
    {
        return $this->belongsToMany(Sizes::class, 'size_pros', 'id_pro', 'id_size');
    }

    public function sizes()
    {
        return $this->belongsToMany(Sizes::class);
    }
}
