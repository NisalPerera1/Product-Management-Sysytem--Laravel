<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      //item data  fetched from model into data variable
      $data = ProductModel::get();
      //sent fetched data into view  using data object keyword
    return view('product.Index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('product.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the input fields
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price'=> 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imageName = time().'.'.$request->image->extension();

    $request->image->storeAs('public/images', $imageName,);

    $product = new ProductModel();
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->image = $imageName;
    $product->save();

    return redirect()->route('product.index')
                     ->with('success','Product created successfully.');
}


    
    public function show(ProductModel $product)
    {
        //
    }

        public function edit($id)
        {
            $product = ProductModel::find($id);
            return view('product.Edit', compact('product'));
        }
    
        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, ProductModel $product)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price'=> 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->storeAs('public/images', $imageName);
        $product->image = $imageName;
    }

    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->save();

    return redirect()->route('product.index')->with('success', 'Product edited successfully.');
}

    public function destroy(ProductModel $product)
    {
        
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product Deleted successfully.');

    }


public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}

}
