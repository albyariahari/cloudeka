<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Request
use App\Http\Requests\Admin\Product\Store as StoreProductRequest;
use App\Http\Requests\Admin\Product\Update as UpdateProductRequest;

// Datatables
use App\DataTables\ProductDataTable;

// Models
use App\Models\Client;
use App\Models\Partner;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\UseCase;

// Services
use App\Services\ProductService;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:Create Product'])->only(['create', 'store']);
        $this->middleware(['permission:Edit Product'])->only(['edit', 'update']);
        $this->middleware(['permission:Delete Product'])->only(['destroy']);
        $this->middleware(['permission:Show Product'])->only(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.index', ['page' => 'Product - List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        $partners = Partner::all();
        $useCases =  UseCase::with('Client')->get();
        $clients = Client::all();

        $this->setData(['page' => 'Create New Product', 'categories' => $categories, 'partners' => $partners, 'use_cases' => $useCases, 'clients' => $clients]);
        return view('admin.product.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request, ProductService $productService)
    {
        $product = $productService->create($request);

        return redirect(route('admin.product.index'))->withSuccess('Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Product $product)
    {
        $this->setData(["page" => 'Show Detail Product', 'product' => $product, 'lang' => $request->get('lang', env('APP_LOCALE_LANG', 'en')), 'languages' => languages()]);
        return view('admin.product.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all();
        $partners = Partner::all();
        $useCases = UseCase::with('Client')->get();
        $client = Client::all();
        $languages = languages();

        $this->setData(["page" => 'Edit Product', 'product' => $product, 'categories' => $categories, 'partners' => $partners, 'use_cases' => $useCases, 'clients' => $client, 'languages' => $languages,  'lang' => $request->get('lang', env('APP_LOCALE_LANG', 'en'))]);
        return view('admin.product.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id, ProductService $productService)
    {
        $product = $productService->update($request, $id);

        return redirect(route('admin.product.index'))->withSuccess('Product update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(["type" => 'success', "message" => 'Product successfully deleted!'], 200);
    }
}
