<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
       return DB::table('categories')->select('*')->get();
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
        $request->validate([
            'newCategory' => 'required|unique:categories|max:50'
        ]);
        $category = new CategoryModel();
        $category->name = $request->input('newCategory');
        $category->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryModel $categoryModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryModel $categoryModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryModel $categoryModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryModel $categoryModel)
    {

    }
}
