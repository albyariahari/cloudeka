<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Request
use App\Http\Requests\Admin\Clients\Store as StoreClientRequest;
use App\Http\Requests\Admin\Clients\Update as UpdateClientRequest;

// Datatables
use App\DataTables\ClientDataTable;

// Models
use App\Models\Client;
use App\Services\ClientService;

class ClientController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ClientDataTable $dataTable) {
        return $dataTable->render('admin.clients.index', ['page' => 'Clients - List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
		$data['page'] = 'Create New Client';
		
        $this->setData($data);

        return view('admin.clients.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Clients\Store  $request
     * @return \Illuminate\Http\Response
     * @param  \App\Services\ClientService  $service
     */
    public function store(StoreClientRequest $request, ClientService $service) {
        if ($service->create($request))
			return redirect(route('admin.clients.index'))->withSuccess('Client created successfully');
		else
			return redirect(route('admin.clients.index'))->withError('Can\'t create Client!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  String  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $item = Client::findOrFail($id);
		
		$data['page'] = 'Edit Client';
		$data['content'] = $item;
		
        $this->setData($data);

        return view('admin.clients.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\Clients\Update  $request
     * @param  String  $id
     * @param  \App\Services\ClientService  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, $id, ClientService $service) {
        if ($service->update($request, $id))
			return redirect(route('admin.clients.index'))->withSuccess('Client updated successfully');
		else
			return redirect(route('admin.clients.index'))->withError('Can\'t update Client!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  String  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
		if (!$item = Client::findOrFail($id))
			return response()->json(['type' => 'error', 'message' => 'Client not found!'], 404);
		else if (!$item->delete())
			return response()->json(['type' => 'error', 'message' => 'Can\'t delete Client!'], 500);
		else
			return response()->json(['type' => 'success', 'message' => 'Client successfully deleted!'], 200);
    }
	
	public function status($id, $action, ClientService $service) {
		if (!$item = Client::findOrFail($id))
			return response()->json(['type' => 'error', 'message' => 'Client not found!'], 404);
		else if (!$service->status($id, $action))
			return response()->json(['type' => 'error', 'message' => 'Can\'t '.((int) $action === 1 ? 'display' : 'hide').' Client!'], 500);
		else
			return response()->json(['type' => 'success', 'message' => 'Client successfully '.((int) $action === 1 ? 'displayed' : 'hidden').'!'], 200);
	}
}