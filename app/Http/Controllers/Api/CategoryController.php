<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function index() {
        $categories = Category::withCount('products')->get()->map(function($cat) {
            $data = $cat->toArray();
            $data['active'] = (bool) ($cat->active ?? $cat->status);
            $data['products_count'] = $cat->products_count;
            $data['products'] = $cat->products_count; // alias for frontend
            return $data;
        });
        return response()->json($categories);
    }
    public function store(Request $request) {
        $data = $request->all();
        $data['status'] = $data['active'] ?? true;
        $category = Category::create($data);
        return response()->json($category, 201);
    }
    public function update(Request $request, $id) {
        $category = Category::findOrFail($id);
        $data = $request->all();
        $data['status'] = $data['active'] ?? $category->status;
        $category->update($data);
        return response()->json($category);
    }
    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(null, 204);
    }
}
