<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\UseCase;
use App\Models\Client;

// Datatables
use App\DataTables\UseCaseDataTable;

// Services
use App\Services\UseCaseService;

// Request
use App\Http\Requests\Admin\UseCases\Store as StoreUseCaseRequest;
use App\Http\Requests\Admin\UseCases\Update as UpdateUseCaseRequest;

class UseCaseController extends Controller {
	
    public function index(UseCaseDataTable $dataTable) {
        return $dataTable->render('admin.use-cases.index', ['page' => 'Use Case - List']);
    }
	
    public function create() {
		$data['page'] = 'Create Use Case';
		$data['clients'] = Client::get();
		
        $this->setData($data);

        return view('admin.use-cases.create', $this->data);
    }
	
    public function store(StoreUseCaseRequest $request, UseCaseService $service) {
        if (!$service->create($request))
			return redirect(route('admin.use-cases.index'))->withError('Can\'t create Use Case!');
		else
			return redirect(route('admin.use-cases.index'))->withSuccess('Use Case created!');
    }
	
    public function edit(Request $request, $id) {
		if (!$data = UseCase::find($id))
			return redirect(route('admin.use-cases.index'))->withSuccess('Use Case not found!');
		
        $this->setData([
			'page' => 'Edit Use Case'
			, 'clients' => Client::get()
			, 'lang' => $request->get('lang', env('APP_LOCALE_LANG', 'en'))
			, 'languages' => languages()
			, 'content' => $data
		]);
		
        return view('admin.use-cases.edit', $this->data);
    }
	
    public function update(UpdateUseCaseRequest $request, UseCaseService $service, $id) {
		if (!$data = UseCase::find($id))
			return redirect(route('admin.use-cases.index'))->withSuccess('Use Case not found!');
        else if (!$service->update($request->all(), $data->id))
			return redirect(route('admin.use-cases.index'))->withError('Can\'t update Use Case!');
		else
			return redirect(route('admin.use-cases.index'))->withSuccess('Use Case updated!');
    }
	
    public function show(UseCase $usecase) {
        //
    }
	
    public function destroy($id) {
		if (!$data = UseCase::find($id))
			return response()->json(['type' => 'error', 'message' => 'Use Case not found!'], 404);
		else if (!$data->delete())
			return response()->json(['type' => 'error', 'message' => 'Can\'t delete Use Case!'], 500);
		else
			return response()->json(['type' => 'success', 'message' => 'Use Case deleted!'], 200);
    }
	
	public function status(UseCaseService $service, $id, $action) {
		if (!$data = UseCase::find($id))
			return response()->json(['type' => 'error', 'message' => 'Use Case not found!'], 404);
		else if (!$service->status($id, $action))
			return response()->json(['type' => 'error', 'message' => 'Can\'t '.((int) $action === 1 ? 'publish' : 'take down').' Use Case!'], 500);
		else
			return response()->json(['type' => 'success', 'message' => 'Use Case '.((int) $action === 1 ? 'published' : 'taken down').'!'], 200);
	}
}