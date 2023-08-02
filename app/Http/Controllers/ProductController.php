<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::orderBy('created_at', 'asc')
            ->paginate(7);
        return view('product.product_list', compact('products'));
    
    }

   
    public function create()
    {
        return view('product.add_product');
    }

    
   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'category' => 'required|string|max:255',
        'file_upload' => 'required',
    ]);

    $product = new Product([
        'name' => $request->input('name'),
        'price' => $request->input('price'),
        'category' => $request->input('category'),
    ]);

    // file upload
    if ($request->hasFile('file_upload')) {
    $file = $request->file('file_upload');
    $filename = time() . '_' . $file->getClientOriginalName();
    $filePath = 'uploads/' . $filename;
    $file->move(public_path('uploads'), $filename);
    $product->image = $filename;
}


    $product->save();
    return redirect()->route('products.index')->with('success', 'Product created successfully!');
}

 public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit_product', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'file_upload' => 'required',
        ]);
        $file = request('filess');
    if ($request->hasFile('file_upload')) {
        $file = $request->file('file_upload');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);
        $file = $filename;
        
    }

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'image' => $request->input('image'),
        ]);
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
    //for user list product
    public function showProducts(){
        $products = Product::select('name', 'image','price', 'category')->get();
        return response()->json(['products' => $products]);

    }
}
