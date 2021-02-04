<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

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
        $topProducts = Product::all()->random(3);
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
}
