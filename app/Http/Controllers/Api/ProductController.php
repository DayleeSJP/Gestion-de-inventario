<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() { 
        $products = Product::with('category')->get()->map(function($p) {
            $data = $p->toArray();
            $data['category'] = $p->category ? $p->category->name : 'Sin categoría';
            return $data;
        });
        return response()->json($products); 
    }
    public function store(Request $request) {
        $data = $request->all();
        if (isset($data['category'])) {
            $cat = Category::firstOrCreate(['name' => $data['category']]);
            $data['category_id'] = $cat->id;
            unset($data['category']);
        }
        $product = Product::create($data);
        return response()->json($product, 201);
    }
    public function update(Request $request, Product $product) {
        $data = $request->all();
        if (isset($data['category'])) {
            $cat = Category::firstOrCreate(['name' => $data['category']]);
            $data['category_id'] = $cat->id;
            unset($data['category']);
        }
        $product->update($data);
        return response()->json($product);
    }
    public function destroy(Product $product) {
        $product->delete();
        return response()->json(null, 204);
    }
}
