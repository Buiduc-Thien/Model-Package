<?php

namespace ModelsPackage\Laravel\Models;


use Illuminate\Database\Eloquent\Model;

class SizeProduct extends Model
{
    protected $table = 'product_size';

    protected $fillable = [
        'name',
        'product_id',
        'size_id',
    ];
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_size')
            ->withPivot('quantity');
    }

    public function getQuantity($sizeName)
    {
        return $this->sizes()
            ->where('sizes.name', $sizeName)
            ->sum('product_size.quantity');
    }

    public function getQuantities()
    {
        return $this->sizes()
            ->selectRaw('sizes.name, SUM(product_size.quantity) as quantity')
            ->join('product_size', 'sizes.id', '=', 'product_size.size_id')
            ->groupBy('sizes.name')
            ->pluck('quantity', 'name');
    }


}
