<?php

namespace ModelsPackage\Laravel\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'image_path'
    ];

    // Lấy ra size của sản phẩm
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_size');
    }


}
