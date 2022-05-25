<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

// Request
use Illuminate\Http\Request;

// Model
use App\Models\Calculator;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $collection = [];

        $lang = $request->get('lang', 'en');

        $categories = ProductCategory::get();

        foreach ($categories as $category) {
            $products = [];
            foreach ($category->Products()->whereHas('Calculators')->get() as $key => $product) {
                $products[] = [
                    'title' => $product->translate($lang)->title,
                    'slug' => $product->translate($lang)->slug,
                ];
            }

            $collection[] = [
                'category' => $category->title,
                'category_slug' => $category->slug,
                'products' => $products
            ];
        };

        return parent::response('success', 'Success', $collection);
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
