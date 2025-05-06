<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Add this at the top of the file
use App\Models\Product;


class ProductController extends Controller
{
    // This method will show products page
    public function index() {
        $products = Product::orderBy('created_at', 'DESC')->get();
        
        return view('products.list',[
            'products' => $products
        ] );
    }

    // This method will show create product page
    public function create() {
        return view('products.create');
    }

    // This method will store a product in db
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('products.create')->withInput()->withErrors($validator); // <- Pass validator object here
        }

        // Store product
        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        if ($request->hasFile('image')) {
            $image = $request->file('image'); // Get the uploaded image

            // Get the original extension (e.g., .jpg, .png)
            $ext = $image->getClientOriginalExtension();

            // Generate a unique name for the image
            $imageName = time() . '.' . $ext;

            // Save the image to the 'uploads/products' directory
            $image->move(public_path('uploads/products'), $imageName);

            // Save the product to the database
            $product->image = 'uploads/products/' . $imageName;
            $product->save();
        } else {
            return redirect()->back()->withErrors('No image uploaded.');
        }

        return redirect()->route('products.index')->with('success', 'Product added successfully');

    }

    // This method will show edit product page
    public function edit() {

    }

    // This method will update a product
    public function update() {

    }

    // This method will delete product
    public function destroy() {

    }
}