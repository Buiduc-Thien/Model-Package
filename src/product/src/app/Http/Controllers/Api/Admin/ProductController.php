<?php

namespace ModelsPackage\Laravel\Product\Http\Controllers\Api\Admin;
use App\Http\Controllers\Controller;
use ModelsPackage\Laravel\Models\Product;

class ProductController extends Controller
{
    public function getProductBySizeName($sizeName)
    {
        $products = Product::with('sizes')->whereHas('sizes', function ($query) use ($sizeName) {
            $query->where('name', $sizeName);
        })->get();
        return response()->json(['data' => $products]);
    }

}
