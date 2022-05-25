<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Request
use App\Http\Requests\Admin\Partners\Store as StorePartnerRequest;
use App\Http\Requests\Admin\Partners\Update as UpdatePartnerRequest;

// Datatables
use App\DataTables\PartnerDataTable;

// Models
use App\Models\Partner;
use App\Services\PartnerService;

class PartnerController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PartnerDataTable $dataTable) {
        return $dataTable->render('admin.partners.index', ['page' => 'Partners - List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
		$data['page'] = 'Create New Partner';
		
        $this->setData($data);

        return view('admin.partners.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Partners\Store  $request
     * @return \Illuminate\Http\Response
     * @param  \App\Services\PartnerService  $service
     */
    public function store(StorePartnerRequest $request, PartnerService $service) {
        if ($service->create($request))
			return redirect(route('admin.partners.index'))->withSuccess('Partner created successfully');
		else
			return redirect(route('admin.partners.index'))->withError('Can\'t create Partner!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  String  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $item = Partner::findOrFail($id);
		
		$data['page'] = 'Edit Partner';
		$data['content'] = $item;
		
        $this->setData($data);

        return view('admin.partners.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Partners\Update  $request
     * @param  String  $id
     * @param  \App\Services\PartnerService  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePartnerRequest $request, $id, PartnerService $service) {
        if ($service->update($request, $id))
			return redirect(route('admin.partners.index'))->withSuccess('Partner updated successfully');
		else
			return redirect(route('admin.partners.index'))->withError('Can\'t update Partner!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  String  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
		if (!$item = Partner::findOrFail($id))
			return response()->json(['type' => 'error', 'message' => 'Partner not found!'], 404);
		else if (!$item->delete())
			return response()->json(['type' => 'error', 'message' => 'Can\'t delete Partner!'], 500);
		else
			return response()->json(['type' => 'success', 'message' => 'Partner successfully deleted!'], 200);
    }
}