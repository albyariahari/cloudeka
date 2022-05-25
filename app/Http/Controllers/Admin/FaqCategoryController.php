<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;	

// Datatables
use App\DataTables\FaqCategoryDataTable;

// Services
use App\Services\FaqCategoryService;

// Requests
use App\Http\Requests\Admin\FaqCategory\Store as StoreFaqCategoryRequest;
use App\Http\Requests\Admin\FaqCategory\Update as UpdateFaqCategoryRequest;

class FaqCategoryController extends Controller {
	private $__check;
	
    public function __construct(FaqCategoryService $service) {
		$id = request()->route('id');
		$this->__check = $service->Check($id);
    }
	
    public function index(FaqCategoryDataTable $dataTable) {
		$this->pushData([
			'page' => 'List FAQ Category'
		]);
		
        return $dataTable->render('admin.faq-category.index', $this->data);
    }
	
    public function create() {
		$this->pushData([
			'page' => 'Create FAQ Category'
		]);
		
        return view('admin.faq-category.create', $this->data);
    }
	
    public function store(FaqCategoryService $service, StoreFaqCategoryRequest $request) {
        if (!$service->Create($request->all()))
			return redirect(route('admin.faq.category.create'))->withError('Can\'t create FAQ Category!');
		else
			return redirect(route('admin.faq.category.index'))->withSuccess('FAQ Category created!');
    }
	
    public function edit($id) {
        if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
		
		$this->pushData([
			'page' => 'Edit FAQ Category'
			, 'data' => $this->__check['data']
		]);
		
        return view('admin.faq-category.edit', $this->data);
    }
	
    public function update(FaqCategoryService $service, UpdateFaqCategoryRequest $request, $id) {
        if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
        else if (!$service->Update($request->all(), $id))
			return redirect(route('admin.faq.category.edit', [$id]))->withError('Can\'t update FAQ Category!');
		else
			return redirect(route('admin.faq.category.index'))->withSuccess('FAQ Category updated!');
    }
	
    public function destroy(FaqCategoryService $service, $id) {
        if (!$this->__check['result'])
			return response()->json(['type' => 'error', 'message' => $this->__check['error']], 404);
        else if (!$service->Delete($id))
			return response()->json(['type' => 'error', 'message' => 'Can\'t delete FAQ Category!'], 500);
        else
			return response()->json(['type' => 'success', 'message' => 'FAQ category deleted!'], 200);
    }
	
    public function move($id, $action) {
		if (!$this->__check['result'])
			return redirect($this->__check['url'])->withError($this->__check['error']);
		else if (!Order('faq_categories', $id, $action))
			return response()->json(['type' => 'error', 'message' => 'Can\'t move FAQ Category '.((int) $action === 0 ? 'up' : 'down').'!'], 500);
		else
			return response()->json(['type' => 'success', 'message' => 'FAQ Category successfully moved '.((int) $action === 0 ? 'up' : 'down').'!'], 200);
    }
}