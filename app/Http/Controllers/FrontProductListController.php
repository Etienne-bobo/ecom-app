<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;

class FrontProductListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topCategories = Category::latest()->take(3)->get();
        $topProducts = Product::latest()->take(3)->get();
        $categories = Category::latest()->get();
        return Inertia::render('Welcome', [
            'topCategories' => $topCategories,
            'topProducts' => $topProducts,
            'categories' => $categories
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //inRandomOrder->limit(3)
        $product = Product::find($id);
        $topProducts = Product::inRandomOrder()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(3)
            ->get();
        return Inertia::render('FrontEnd/showSingleProduct', ['product' => $product, 'topProducts' => $topProducts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function allProducts(Request $request,$name){
        $category = Category::where('slug', $name)->first();
        if($request->get('subcategory')){
            //filter
            $products =Product::where('subcategory_id', $request->subcategory)
            ->get();
        }else{
            $products = Product::where('category_id', $category->id)->get();
        }
        $subcategories = Subcategory::where('category_id', $category->id)->get();
        $slug = $name;
        return Inertia::render('FrontEnd/productListPerCategory', ['products' => $products, 'subcategories' => $subcategories, 'slug' => $slug]);

    }

    // public function filterProducts(Request $request){
    //     $subId = [];
    //     $subcategory = Subcategory::whereIn('id', [$request->get('subcategory')])->get();
    //     foreach($subcategory as $sub){
    //         array_push($subId, $sub->id);
    //     }
    //     $products = Product::whereIn('subcategory_id', $subId)->get();
    // }
}
