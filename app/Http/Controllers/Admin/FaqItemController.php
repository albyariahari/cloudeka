<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Service(s)
use App\Services\FaqItemService;

// Datatable
use App\DataTables\FaqItemDataTable;

// Request(s)
use App\Http\Requests\Admin\FaqItem\Store as StoreFaqItemRequest;
use App\Http\Requests\Admin\FaqItem\Update as UpdateFaqItemRequest;

class FaqItemController extends Controller {
	private $__check;
	
	public function __construct(FaqItemService $service) {
		$slug = request()->route('slug');
		$faqID = request()->route('id');
		$id = request()->route('item_id');
		$lang = request()->get('lang', env('APP_LOCALE_LANG', 'en'));
		$this->__check = $service->Check($slug, $faqID, $id);
		
		$this->setData([
			'languages' => languages()
			, 'lang' => $lang
			, 'slug' => $slug
			, 'faqID' => $faqID
		]);
	}
	
    public function index(FaqItemDataTable $dataTable, $slug, $faqID) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
		
		$this->pushData([
			'page' => 'List FAQ Item'
		]);
		
        return $dataTable->with($this->data)->render('admin.faq-item.index', $this->data);
    }
	
    public function create($slug, $faqID) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
		
		$this->pushData([
			'page' => 'Create FAQ Item'
		]);
		
        return view('admin.faq-item.create', $this->data);
    }
	
    public function store(FaqItemService $service, StoreFaqItemRequest $request, $slug, $faqID) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
        else if (!$service->Create($request->all(), $slug, $faqID))
			return redirect(route('admin.faq.item.create', [$slug, $faqID]))->withError('Can\'t create FAQ Item');
		else
			return redirect(route('admin.faq.item.index', [$slug, $faqID]))->withSuccess('FAQ Item created!');
    }
	
    public function edit($slug, $faqID, $id) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
		
		$this->pushData([
			'page' => 'Edit FAQ Item'
			, 'data' => $this->__check['data']
			, 'translate' => $this->__check['data']->translate($this->data['lang'])
		]);
		
        return view('admin.faq-item.edit', $this->data);
    }
	
    public function update(FaqItemService $service, UpdateFaqItemRequest $request, $slug, $faqID, $id) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
		else if (!$service->Update($request->all(), $id))
			return redirect(route('admin.faq.item.edit', [$slug, $faqID, $id]))->withError('Can\'t update FAQ Item');
		else
			return redirect(route('admin.faq.item.index', [$slug, $faqID]))->withSuccess('FAQ Item updated!');
    }
	
    public function destroy(FaqItemService $service, $slug, $faqID, $id) {
		if (!$this->__check['result'])
			return response()->json(['type' => 'error', 'message' => $this->__check['error']], 404);
        else if (!$service->Delete($id))
			return response()->json(['type' => 'error', 'message' => 'Can\'t delete FAQ Item!'], 500);
        else
			return response()->json(['type' => 'success', 'message' => 'FAQ Item deleted!'], 200);
    }
	
    public function move($slug, $faqID, $id, $action) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
		else if (!Order('faq_items', $id, $action, ['faq_id' => $faqID]))
			return response()->json(['type' => 'error', 'message' => 'Can\'t move FAQ Item '.((int) $action === 0 ? 'up' : 'down').'!'], 500);
		else
			return response()->json(['type' => 'success', 'message' => 'FAQ Item successfully moved '.((int) $action === 0 ? 'up' : 'down').'!'], 200);
    }
	
    public function ajaxGetTranslatable(FaqItemService $service, Request $request, $slug, $faqID, $id) {
		if (!$this->__check['result'])
			return response()->json(['type' => 'error', 'message' => $this->__check['error']], 404);
        else
			return response()->json(['type' => 'success', 'data' => $this->__check['data']->translate($request->lang)], 200);
    }
}