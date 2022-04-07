<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;

// Request
use App\Http\Requests\Admin\Product\Category\Store as StoreProductCategoryRequest;

// Datatables
use App\DataTables\ProductCategoryDataTable;

// Models
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:Create Product Category'])->only(['create', 'store']);
        $this->middleware(['permission:Edit Product Category'])->only(['edit', 'update']);
        $this->middleware(['permission:Delete Product Category'])->only(['destroy']);
        $this->middleware(['permission:Show Product Category'])->only(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.product.category.index', ['page' => 'Product Category - List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setData(['page' => 'Create New Product Category']);
        return view('admin.product.category.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductCategoryRequest $request)
    {
        $input = $request->all();
        $input['slug'] = Str::slug($request->get('title'));
        $product = ProductCategory::create($input);

        return redirect(route('admin.product.category.index'))->withSuccess('Product category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = ProductCategory::findOrFail($id);

        $this->setData(["page" => 'Show Detail Product Category', 'category' => $category]);
        return view('admin.product.category.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = ProductCategory::findOrFail($id);

        $this->setData(["page" => 'Edit Product Category', 'category' => $category]);
        return view('admin.product.category.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductCategoryRequest $request, $id)
    {
        $category = ProductCategory::findOrFail($id);
        $input = $request->all();
        $input['slug'] = Str::slug($request->get('title'));
        $category->update($input);

        return redirect(route('admin.product.category.index'))->withSuccess('Product category update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ProductCategory::findOrFail($id)->delete();

        return response()->json(["type" => 'success', "message" => 'Product category successfully deleted!'], 200);
    }
}
