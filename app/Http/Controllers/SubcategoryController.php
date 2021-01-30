<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::latest()->with('category')->get();
        return Inertia::render('Subcategory/Index', [ 'subcategories' => $subcategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return Inertia::render('Subcategory/Create', [ 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Subcategory::create([
            'category_id' => $request->get('category'),
            'name' => $request->get('name'),
        ]);
        return Redirect::route('subcategory.index');
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
        $subcategory = Subcategory::with('category')->find($id);
        $categories = Category::latest()->get();
        return Inertia::render('Subcategory/Edit', ['subcategory' => $subcategory, 'categories' => $categories]);
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
        $subcategory = Subcategory::find($id);
        $subcategory->name = $request->get('name');
        $subcategory->category_id = $request->get('category');
        $subcategory->save();
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
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        return Redirect::route('subcategory.index');
    }
}
