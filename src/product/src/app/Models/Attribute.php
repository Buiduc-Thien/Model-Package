<?php

namespace ModelsPackage\Laravel\Models;


use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = [
        'name',
        'product_id',
        'size_id',
    ];


    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_product');
    }
}
