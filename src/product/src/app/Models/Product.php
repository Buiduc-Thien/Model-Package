<?php

namespace ModelsPackage\Laravel\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image_path'
    ];

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_product');
    }
}
