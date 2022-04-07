<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Datatables
use App\DataTables\PromotionDataTable;

// Services
use App\Services\PromotionService;

// Request(s)
use App\Http\Requests\Admin\Promotion\Store as PromotionStoreRequest;
use App\Http\Requests\Admin\Promotion\Update as PromotionUpdateRequest;

class PromotionController extends Controller {
	private $__check;
	
    public function __construct(PromotionService $service) {
		$id = request()->route('id');
		$lang = request()->get('lang', env('APP_LOCALE_LANG', 'en'));
		$this->__check = $service->Check($id, $lang);
		
        $this->setData([
			'languages' => languages()
			, 'lang' => $lang
			, 'products' => $service->GetProducts($lang)
		]);
    }
	
    public function index(PromotionDataTable $dataTable) {
        $this->pushData([
			'page' => 'List Promotion'
		]);
		
        return $dataTable->with($this->data)->render('admin.promotion.index', $this->data);
    }
	
    public function create() {
        $this->pushData([
			'page' => 'Create Promotion'
		]);

        return view('admin.promotion.create', $this->data);
    }
	
    public function store(PromotionService $service, PromotionStoreRequest $request) {
		if (!$service->Create($request->all())){
			return redirect(route('admin.promotion.create'))->withError('Can\'t create Promotion!');
		}else{
			if($request->has('is_popup'))
				\App\Models\Setting::where('name', 'system_last_popup_show')->update(['value' => \Carbon\Carbon::now('UTC')->timestamp]);
				
			return redirect(route('admin.promotion.index'))->withSuccess('Promotion created!');
		}
    }
	
    public function edit($id) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);

        $this->pushData([
			'page' => 'Edit Promotion'
			, 'data' => $this->__check['data']
			, 'translate' => $this->__check['data']->translate($this->data['lang'])
		]);
        
		return view('admin.promotion.edit', $this->data);
    } 
	
    public function update(PromotionService $service, PromotionUpdateRequest $request, $id) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
		else if (!$service->Update($request->all(), $id))
			return redirect(route('admin.promotion.update'))->withError('Can\'t update Promotion!');
		else{
			if($request->has('is_popup'))
				\App\Models\Setting::where('name', 'system_last_popup_show')->update(['value' => \Carbon\Carbon::now('UTC')->timestamp]);

			return redirect(route('admin.promotion.index'))->withSuccess('Promotion updated!');
		}
    }
	
    public function destroy(PromotionService $service, $id) {
		if (!$this->__check['result'])
			return response()->json(['type' => 'error', 'message' => $this->__check['error']], 404);
        else if (!$service->Delete($id))
			return response()->json(['type' => 'error', 'message' => 'Can\'t delete Promotion!'], 500);
        else
			return response()->json(['type' => 'success', 'message' => 'Promotion deleted!'], 200);
    }
	
    public function ajaxGetTranslatable(PromotionService $service, Request $request, $id) {
		if (!$this->__check['result'])
			return response()->json(['type' => 'error', 'message' => $this->__check['error']], 404);
        else {
			$trans = $this->__check['data']->translate($request->lang);
			$trans->image = cloudekaURL($trans->image);
			
			return response()->json(['type' => 'success', 'data' => $trans], 200);
		}
    }
	
    public function ajaxSetPopup(PromotionService $service, $id, $action) {
		if (!$this->__check['result']){
			return response()->json(['type' => 'error', 'message' => $this->__check['error']], 404);
		}else if (!$service->SetPopup($id, $action)){
            return response()->json(['type' => 'error', 'message' => 'Can\'t '.((int) $action === 1 ? 'unset' : 'set').' Promotion as popup!'], 500);
        }else{
			\App\Models\Setting::where('name', 'system_last_popup_show')->update(['value' => \Carbon\Carbon::now('UTC')->timestamp]);
			return response()->json(['type' => 'success', 'message' => 'Promotion has been '.((int) $action === 0 ? 'unset' : 'set').' as popup!'], 200);
		}
    }
}