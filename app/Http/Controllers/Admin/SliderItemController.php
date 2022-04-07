<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Service(s)
use App\Services\SliderItemService;

// Datatable
use App\DataTables\SliderItemDataTable;

// Request(s)
use App\Http\Requests\Admin\SliderItem\Store as StoreSliderItemRequest;
use App\Http\Requests\Admin\SliderItem\Update as UpdateSliderItemRequest;

class SliderItemController extends Controller {
	private $__check;
	
    public function __construct(SliderItemService $service) {
        /*$this->middleware(['permission:Create Slider'])->only(['create', 'store']);
        $this->middleware(['permission:Edit Slider'])->only(['edit', 'update']);
        $this->middleware(['permission:Delete Slider'])->only(['destroy']);*/
		
		$sliderID = request()->route('slider');
		$id = request()->route('item');
		$lang = request()->get('lang', env('APP_LOCALE_LANG', 'en'));
		$this->__check = $service->check($sliderID, $id);
		
		$this->setData([
			'languages' => languages()
			, 'lang' => $lang
			, 'sliderID' => $sliderID
			, 'settings' => $this->__check['parent']->only(['field_title', 'field_subtitle', 'field_description', 'field_cta'])
		]);
    }
	
    public function index(SliderItemDataTable $dataTable, $sliderID) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
		
        $this->pushData([
			'page' => 'List Slider Item'
		]);
		
        return $dataTable->with($this->data)->render('admin.slider.item.index', $this->data);
    }
	
    public function create($sliderID) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
		
        $this->setData([
			'page' => 'Create Slider Item'
		]);

        return view('admin.slider.item.create', $this->data);
    }
	
    public function store(SliderItemService $service, StoreSliderItemRequest $request, $sliderID) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
        else if (!$service->Create($request->all(), $sliderID))
			return redirect(route('admin.slider.item.create', [$sliderID]))->withError('Can\'t create Slider Item');
		else
			return redirect(route('admin.slider.item.index', [$sliderID]))->withSuccess('Slider Item created!');
    }
	
    public function edit($sliderID, $id) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
		
		$this->pushData([
			'page' => 'Edit Slider Item'
			, 'data' => $this->__check['data']
			, 'translate' => $this->__check['data']->translate($this->data['lang'])
		]);
		
        return view('admin.slider.item.edit', $this->data);
    }
	
    public function update(SliderItemService $service, UpdateSliderItemRequest $request, $sliderID, $id) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
		else if (!$service->Update($request->all(), $id))
			return redirect(route('admin.slider.item.edit', [$sliderID, $id]))->withError('Can\'t update Slider Item');
		else
			return redirect(route('admin.slider.item.index', [$sliderID]))->withSuccess('FAQ Slider updated!');
    }
	
    public function destroy(SliderItemService $service, $sliderID, $id) {
		if (!$this->__check['result'])
			return response()->json(['type' => 'error', 'message' => $this->__check['error']], 404);
        else if (!$service->Delete($id))
			return response()->json(['type' => 'error', 'message' => 'Can\'t delete Slider Item!'], 500);
        else
			return response()->json(['type' => 'success', 'message' => 'Slider Item deleted!'], 200);
    }
	
    public function move($sliderID, $id, $action) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
		else if (!Order('slider_items', $id, $action, ['slider_id' => $sliderID]))
			return response()->json(['type' => 'error', 'message' => 'Can\'t move Slider Item '.((int) $action === 0 ? 'up' : 'down').'!'], 500);
		else
			return response()->json(['type' => 'success', 'message' => 'Slider Item successfully moved '.((int) $action === 0 ? 'up' : 'down').'!'], 200);
    }
	
    public function ajaxGetTranslatable(SliderItemService $service, Request $request, $sliderID, $id) {
		if (!$this->__check['result'])
			return response()->json(['type' => 'error', 'message' => $this->__check['error']], 404);
        else
			return response()->json(['type' => 'success', 'data' => $this->__check['data']->translate($request->lang)], 200);
    }
}