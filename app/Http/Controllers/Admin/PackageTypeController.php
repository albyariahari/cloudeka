<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Request
use App\Http\Requests\Admin\PackageType\Store as StorePackageTypeRequest;
use App\Http\Requests\Admin\PackageType\Update as UpdatePackageTypeRequest;

// Datatables
use App\DataTables\PackageTypeDataTable;

// Models
use App\Models\PackageType;

// Services
use App\Services\PackageTypeService;

class PackageTypeController extends Controller
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
    public function index(PackageTypeDataTable $dataTable)
    {
        return $dataTable->render('admin.package-type.index', ['page' => 'Package Type - List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setData(['page' => 'Create New Package Type']);

        return view('admin.package-type.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackageTypeRequest $request, PackageTypeService $packageTypeService)
    {
        $package = $packageTypeService->create($request);

        return redirect(route('admin.package-type.index'))->withSuccess('Package Type created successfully');
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
