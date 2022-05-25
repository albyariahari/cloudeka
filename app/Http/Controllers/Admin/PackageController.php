<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Request
use App\Http\Requests\Admin\Package\Store as StorePackageRequest;
use App\Http\Requests\Admin\Package\Update as UpdatePackageRequest;

// Datatables
use App\DataTables\PackageDataTable;

// Models
use App\Models\Package;
use App\Models\Product;

// Services
use App\Services\PackageService;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:Create Package'])->only(['create', 'store']);
        $this->middleware(['permission:Edit Package'])->only(['edit', 'update']);
        $this->middleware(['permission:Delete Package'])->only(['destroy']);
        $this->middleware(['permission:Show Package'])->only(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PackageDataTable $dataTable)
    {
        return $dataTable->render('admin.package.index', ['page' => 'Package - List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $this->setData(['page' => 'Create New Package', 'products' => $products]);

        return view('admin.package.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackageRequest $request, PackageService $packageService)
    {
        $package = $packageService->create($request);

        return redirect(route('admin.package.index'))->withSuccess('Package created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        $this->setData(["page" => 'Show Detail Package', 'package' => $package]);
        return view('admin.package.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        $products = Product::all();
        $this->setData(['page' => 'Edit Package', 'package' => $package, 'products' => $products]);

        return view('admin.package.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackageRequest $request, $id, PackageService $packageService)
    {
        $package = $packageService->update($request, $id);

        return redirect(route('admin.package.index'))->withSuccess('Package updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $package->delete();

        return response()->json(["type" => 'success', "message" => 'Package successfully deleted!'], 200);
    }
}
