<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search') ?? "";
        if ($search != "") {
            $products = Product::where('name', 'LIKE', "%$search%")->paginate(5);
        } else {
            $products = Product::latest()->paginate(5);
        }
       
        return view('products.index', ['products' => $products, 'search' => $search]);
    }

    public function trash(Request $request) {
        $search = $request->input('search') ?? "";
        if ($search != "") {
            $products = Product::onlyTrashed()->where('name', 'LIKE', "%$search%")->paginate(5);
        } else {
            $products = Product::onlyTrashed()->paginate(5);
        }
        return view('products.trash', ['products' => $products, 'search' => $search]);
    }
    
    public function create() {
        return view('products.create');
    }
    
    public function store(Request $request) {
        // dd($request->all());
        
        // validation
        
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        
        // upload image
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageName);
        //dd($imageName);
        
        $product = new Product();
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return back()->withSuccess("Product created successfuly!");
        
        // return view('products.store');
        
    }
    public function view($id) {
        $product = Product::where('id', $id)->first();
        return view('products.view', ['product' => $product]);
        
    }
    
    public function edit($id) {
        $product = Product::where('id', $id)->first();
        return view('products.edit', ['product' => $product]);
        
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        
        $product = Product::where('id', $id)->first();
        
        if (isset($request->image)) {
            // upload image
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            //dd($imageName);
            $product->image = $imageName;
        }
        
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return back()->withSuccess("Product updated successfuly!");
    }
    
    public function delete($id) {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return back()->withSuccess("Product moved to trash");
    }

    public function force_delete($id) {
        $product = Product::withTrashed()->where('id', $id)->first();
        $product->forceDelete();
        return back()->withSuccess("Product deleted successfully");
    }
    public function restore($id) {
        $product = Product::withTrashed()->where('id', $id)->first();
        $product->restore();
        return back()->withSuccess("Product restored successfuly!");
    }
    
}
