<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        $products = Product::with('category')->get()->map(function($p) {
            $data = $p->toArray();
            $data['category'] = $p->category ? $p->category->name : 'Sin categoría';
            $data['category_id'] = $p->category_id;
            // Map DB fields to frontend field names
            $data['price'] = $p->price ?? $p->selling_price ?? 0;
            $data['active'] = (bool) ($p->active ?? ($p->status !== 'agotado'));
            $data['image'] = $p->image ?? $p->image_path ?? '';
            return $data;
        });
        return response()->json($products);
    }
    public function store(Request $request) {
        $data = $request->except('image');

        // Map frontend fields to DB fields
        if (isset($data['category'])) {
            $cat = Category::firstOrCreate(['name' => $data['category']]);
            $data['category_id'] = $cat->id;
            unset($data['category']);
        }
        if (isset($data['price'])) {
            $data['selling_price'] = $data['price'];
            $data['cost_price'] = $data['cost_price'] ?? ($data['price'] * 0.5);
        }
        $data['active'] = $data['active'] ?? true;
        $data['status'] = $data['active'] ? 'saludable' : 'agotado';

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $productsPath = public_path('products');
            if (!file_exists($productsPath)) {
                mkdir($productsPath, 0755, true);
            }
            $imageName = time() . '_' . preg_replace('/[^A-Za-z0-9_.-]/', '_', $file->getClientOriginalName());
            $file->move($productsPath, $imageName);
            $data['image'] = '/products/' . $imageName;
            $data['image_path'] = $data['image'];
        } elseif ($request->has('image') && is_string($request->image)) {
            if (preg_match('/^data:image\/(\w+);base64,/', $request->image, $type)) {
                $image = substr($request->image, strpos($request->image, ',') + 1);
                $type = strtolower($type[1]); // jpg, png, gif
                
                $image = str_replace(' ', '+', $image);
                $imageName = \Illuminate\Support\Str::random(10).'.'.$type;
                $productsPath = public_path('products');
                if (!file_exists($productsPath)) {
                    mkdir($productsPath, 0755, true);
                }
                file_put_contents($productsPath . '/' . $imageName, base64_decode($image));
                $data['image'] = '/products/' . $imageName;
                $data['image_path'] = $data['image'];
            } else {
                $data['image'] = $request->image;
                $data['image_path'] = $request->image;
            }
        }

        $product = Product::create($data);
        return response()->json($product, 201);
    }
    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
        $data = $request->except('image');

        if (isset($data['category'])) {
            $cat = Category::firstOrCreate(['name' => $data['category']]);
            $data['category_id'] = $cat->id;
            unset($data['category']);
        }
        if (isset($data['price'])) {
            $data['selling_price'] = $data['price'];
        }
        if (isset($data['active'])) {
            $data['status'] = $data['active'] ? 'saludable' : 'agotado';
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $productsPath = public_path('products');
            if (!file_exists($productsPath)) {
                mkdir($productsPath, 0755, true);
            }
            $imageName = time() . '_' . preg_replace('/[^A-Za-z0-9_.-]/', '_', $file->getClientOriginalName());
            $file->move($productsPath, $imageName);
            $data['image'] = '/products/' . $imageName;
            $data['image_path'] = $data['image'];
        } elseif ($request->has('image') && is_string($request->image)) {
            if (preg_match('/^data:image\/(\w+);base64,/', $request->image, $type)) {
                $image = substr($request->image, strpos($request->image, ',') + 1);
                $type = strtolower($type[1]); // jpg, png, gif
                
                $image = str_replace(' ', '+', $image);
                $imageName = \Illuminate\Support\Str::random(10).'.'.$type;
                $productsPath = public_path('products');
                if (!file_exists($productsPath)) {
                    mkdir($productsPath, 0755, true);
                }
                file_put_contents($productsPath . '/' . $imageName, base64_decode($image));
                $data['image'] = '/products/' . $imageName;
                $data['image_path'] = $data['image'];
            } else {
                $data['image'] = $request->image;
                $data['image_path'] = $request->image;
            }
        }

        $product->update($data);
        return response()->json($product);
    }
    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }
}
