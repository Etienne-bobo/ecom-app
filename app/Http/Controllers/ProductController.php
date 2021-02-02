<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard()
    {
        //$products = Product::with('category', 'subcategory')->get();
        return Inertia::render('Dashboard');
    }

    public function index()
    {
        $products = Product::with('category', 'subcategory')->get();
        return Inertia::render('Product/Index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $subcategorys = Category::with('subcategories')->get();
        //return $subcategorys;
        return Inertia::render('Product/Create', [ 'subcategories' => $subcategories, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image')->store('products');
        Product::create([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'additional_info' => $request->get('additional_info'),
            'category_id' => $request->get('category'),
            'subcategory_id' => $request->get('subcategory'),
            'image' => $image
        ]);
        return Redirect::route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('category','subcategory')->find($id);
        $categories = Category::latest()->get();
        return Inertia::render('Product/Edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $image = $product->image;
        if($request->hasFile('image')){
            $image = $request->file('image')->store('files');
            \Storage::delete($product->image);
        }    
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->description = $request->get('description');
        $product->additional_info = $request->get('additional_info');
        $product->category_id = $request->get('category');
        $product->subcategory_id = $request->get('subcategory');
        $product->image = $image;
        $product->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $filename = $product->image;
        $product->delete();
        \Storage::delete($filename);
        return Redirect::route('product.index');
    }

    public function loadSubCategories(Request $request, $id)
    {
        $data = Subcategory::where('category_id', $id)->get();
        return response()->json($data);
    }


    
}
