<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Datatables
use App\DataTables\FaqDataTable;

// Services
use App\Services\FaqService;

// Requests
use App\Http\Requests\Admin\Faq\Store as StoreFaqRequest;
use App\Http\Requests\Admin\Faq\Update as UpdateFaqRequest;

class FaqController extends Controller {
	private $__check;
	
	public function __construct(FaqService $service) {
		$slug = request()->route('slug');
		$id = request()->route('id');
		$lang = request()->get('lang', env('APP_LOCALE_LANG', 'en'));
		$this->__check = $service->Check($slug, $id, $lang);
		
		$this->setData([
			'languages' => languages()
			, 'lang' => $lang
			, 'slug' => $slug
		]);
	}
	
    public function index(FaqDataTable $dataTable, $slug) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
		
		$this->pushData([
			'page' => 'List FAQ'
		]);
		
        return $dataTable->with($this->data)->render('admin.faq.index', $this->data);
    }
	
    public function create($slug) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
		
		$this->pushData([
			'page' => 'Create FAQ'
		]);
		
        return view('admin.faq.create', $this->data);
    }
	
    public function store(StoreFaqRequest $request, FaqService $service, $slug) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
        else if (!$service->Create($request->all(), $this->__check['data']->id))
			return redirect(route('admin.faq.create', [$slug]))->withError('Can\'t create FAQ!');
		else
			return redirect(route('admin.faq.index', [$slug]))->withSuccess('FAQ created!');
    }
	
    public function edit($slug, $id) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
		
		$this->pushData([
			'page' => 'Edit FAQ'
			, 'data' => $this->__check['data']
			, 'translate' => $this->__check['data']->translate($this->data['lang'])
		]);
		
        return view('admin.faq.edit', $this->data);
    }
	
    public function update(UpdateFaqRequest $request, FaqService $service, $slug, $id) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
        else if (!$service->Update($request->all(), $id))
			return redirect(route('admin.faq.edit', [$slug, $id]))->withError('Can\'t update FAQ');
		else
			return redirect(route('admin.faq.index', [$slug]))->withSuccess('FAQ updated!');
    }
	
    public function destroy(FaqService $service, $slug, $id) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
        else if (!$service->Delete($id))
			return response()->json(['type' => 'error', 'message' => 'Can\'t delete FAQ!'], 500);
        else
			return response()->json(['type' => 'success', 'message' => 'FAQ deleted!'], 200);
    }
	
    public function move($slug, $id, $action) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
		else if (!Order('faqs', $id, $action, ['category_id' => $this->__check['data']->category_id]))
			return response()->json(['type' => 'error', 'message' => 'Can\'t move FAQ '.((int) $action === 0 ? 'up' : 'down').'!'], 500);
		else
			return response()->json(['type' => 'success', 'message' => 'FAQ successfully moved '.((int) $action === 0 ? 'up' : 'down').'!'], 200);
    }
	
    public function ajaxGetTranslatable(FaqService $service, Request $request, $slug, $id) {
		if (!$this->__check['result'])
			return response()->json(['type' => 'error', 'message' => $this->__check['error']], 404);
        else
			return response()->json(['type' => 'success', 'data' => $this->__check['data']->translate($request->lang)], 200);
    }
}