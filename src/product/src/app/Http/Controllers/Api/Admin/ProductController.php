<?php

namespace ModelsPackage\Laravel\Product\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ModelsPackage\Laravel\Models\Product;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::with('sizes')->get();
        return response()->json($products);
    }
    public function getProductBySizeName($sizeName)
    {
        $products = Product::with('sizes')->whereHas('sizes', function ($query) use ($sizeName) {
            $query->where('name', $sizeName);
        })->get();
        return response()->json($products);
    }

    public function createProduct(Request $request)
    {
        $data = $request->all();

        $product = new Product;
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->save();

        $product->sizes()->attach($data['sizes']);

        // return $data;
        return response()->json([
            'success' => true,
            'message' => $data['name'],
        ]);

    }
}
