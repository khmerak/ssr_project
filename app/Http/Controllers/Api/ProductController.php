<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // List all products
    public function index()
    {
        return view('addproduct');
    }
    public function product(){
        return view('main');
    }

    // Create a new product
    public function store(Request $request)
    {
        $request->validate([
            'pro_name' => 'required|string|max:255',
            'cat_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->only(['pro_name', 'cat_id', 'price', 'quantity', 'discount', 'description']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product = Product::create($data);
        $product->load('category');

        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully',
            'data' => $product
        ]);
    }

    // Show a product
    public function show($id)
    {
        $product = Product::with('category')->find($id);
        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Product not found']);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Product retrieved successfully',
            'data' => $product
        ]);
    }

    // Update a product
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Product not found']);
        }

        $request->validate([
            'pro_name' => 'required|string|max:255',
            'cat_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->only(['pro_name', 'cat_id', 'price', 'quantity', 'discount', 'description']);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);
        $product->load('category');

        return response()->json([
            'status' => 'success',
            'message' => 'Product updated successfully',
            'data' => $product
        ]);
    }

    // Delete a product
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Product not found']);
        }

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return response()->json(['status' => 'success', 'message' => 'Product deleted successfully']);
    }

    // Get all categories
    public function getCategories()
    {
        $categories = Category::all();
        return response()->json(['status' => 'success', 'data' => $categories]);
    }

    // Search products by name
    public function search(Request $request)
    {
        $query = $request->get('q', '');
        $products = Product::with('category')
            ->where('pro_name', 'LIKE', "%{$query}%")
            ->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Search results retrieved',
            'data' => $products
        ]);
    }

    // Get products by category
    public function getByCategory($categoryId)
    {
        $products = Product::with('category')
            ->where('cat_id', $categoryId)
            ->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Products retrieved by category',
            'data' => $products
        ]);
    }
}
