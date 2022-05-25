<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Request
use App\Http\Requests\Admin\Package\Item\Store as StorePackageItemRequest;
use App\Http\Requests\Admin\Package\Item\Update as UpdatePackageItemRequest;

// Datatables
use App\DataTables\PackageItemDataTable;

// Models
use App\Models\Package;
use App\Models\PackageType;
use App\Models\PackageItem;
use App\Models\CalculatorComponent;

// Service
use App\Services\PackageItemService;

class PackageItemController extends Controller
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
    public function index($package_id, PackageItemDataTable $dataTable)
    {
        $package = Package::findOrFail($package_id);
        $this->setData(['page' => ucfirst($package->name) . ' Package Item - List', 'package_id' => $package_id, 'package' => $package]);
        return $dataTable->with('package_id', $package_id)->render('admin.package.item.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($package_id)
    {
        $package = Package::findOrFail($package_id);
        $packageType = PackageType::get();
        $components = CalculatorComponent::where('parent_id', 0)->get();
        $this->setData(['page' => 'Create New Package Item', 'components' => $components, 'package' => $package, 'packageType' => $packageType]);

        return view('admin.package.item.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($package_id, StorePackageItemRequest $request, PackageItemService $packageItemService)
    {
        $package = $packageItemService->create($request);

        return redirect(route('admin.package.item.index', $package_id))->withSuccess('Package Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PackageItem  $packageItem
     * @return \Illuminate\Http\Response
     */
    public function show($package_id, $id)
    {
        $packageItem = PackageItem::where('package_id', $package_id)->findOrFail($id);
        $this->setData(['page' => 'Show Detail Package Item', 'packageItem' => $packageItem]);

        return view('admin.package.item.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackageItem  $packageItem
     * @return \Illuminate\Http\Response
     */
    public function edit($package_id, $id)
    {
        $package = Package::findOrFail($package_id);
        $packageType = PackageType::get();
        $packageItem = PackageItem::where('package_id', $package_id)->findOrFail($id);
        $components = CalculatorComponent::where('parent_id', 0)->get();
        $this->setData(['page' => 'Edit Package Item', 'package' => $package, 'packageItem' => $packageItem, 'components' => $components, 'packageType' => $packageType]);

        return view('admin.package.item.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PackageItem  $packageItem
     * @return \Illuminate\Http\Response
     */
    public function update($package_id, UpdatePackageItemRequest $request, $id, PackageItemService $packageItemService)
    {
        $package = $packageItemService->update($request, $package_id, $id);

        return redirect(route('admin.package.item.index', $package_id))->withSuccess('Package Item created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackageItem  $packageItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($package_id, $id)
    {
        $packageItem = PackageItem::where('package_id', $package_id)->findOrFail($id)->delete();

        return response()->json(["type" => 'success', "message" => 'Package Item successfully deleted!'], 200);
    }

    public function setFeatured($package_id, $id)
    {
        $packageItem = PackageItem::where('package_id', $package_id)->findOrFail($id);

        $packageItem->is_featured = true;
        $packageItem->save();

        return response()->json(["type" => 'success', "message" => 'Package Item successfully added to featured item!'], 200);
    }

    public function removeFeatured($package_id, $id)
    {
        $packageItem = PackageItem::where('package_id', $package_id)->findOrFail($id);

        $packageItem->is_featured = false;
        $packageItem->save();

        return response()->json(["type" => 'success', "message" => 'Package Item successfully removed from featured item!'], 200);
    }
}
