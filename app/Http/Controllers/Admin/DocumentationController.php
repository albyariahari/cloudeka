<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

// Requests
use App\Http\Requests\Admin\Documentations\Store as StoreDocumentationRequest;
use App\Http\Requests\Admin\Documentations\Update as UpdateDocumentationRequest;
use App\Http\Requests\Admin\Documentations\Upload as AjaxUploadDocumentetionRequest;

// Datatables
use App\DataTables\DocumentationDataTable;

// Models
use App\Models\Documentation;
use App\Services\DocumentationService;
use App\Models\Product;

class DocumentationController extends Controller {
	public function __construct() {
        $this->setData([
			'languages' => languages()
			, 'lang' => request()->get('lang', env('APP_LOCALE_LANG', 'en'))
			, 'products' => Product::orderBy('category_id')->get()
		]);
	}
	
    public function index(DocumentationDataTable $dataTable) {
        return $dataTable->render('admin.documentations.index', ['page' => 'List Documentation']);
    }
	
    public function create() {
        $this->setData([
			'page' => 'Create Documentation'
			, 'products' => Product::orderBy('category_id')->get()
		]);

        return view('admin.documentations.create', $this->data);
    }
	
    public function edit($id) {
        $this->pushData([
			'page' => 'Edit Documentation'
			, 'content' => Documentation::with('ChildsRec')->find($id)
		]);
		
        return view('admin.documentations.edit', $this->data);
    }
	
    public function sort($id) {
        $this->pushData([
			'page' => 'Sort Documentation'
			, 'content' => Documentation::with('ChildsRec')->find($id)
		]);
		
        return view('admin.documentations.sort', $this->data);
    }

	public function upload(AjaxUploadDocumentetionRequest $request, DocumentationService $service){
		$fileName = $service->StoreAndGetFileName($request->file('editormd-image-file'));
		$success = $fileName ? 1 : 0;
		return response()->json(['success' => $success, 'message' => 'Image successfully uploaded!', 'url'=> $fileName]);
	}

    public function destroy($id) {
		if (!$item = Documentation::find($id))
			return response()->json(['type' => 'error', 'message' => 'Documentation not found!'], 404);
		else if (!$item->delete())
			return response()->json(['type' => 'error', 'message' => 'Can\'t delete Documentation!'], 500);
		else
			return response()->json(['type' => 'success', 'message' => 'Documentation deleted!'], 200);
    }
	
    public function ajaxStoreAll(StoreDocumentationRequest $request, DocumentationService $service) {
		if (!$item = $service->CreateAll($request->all()))
			return response()->json(['type' => 'error', 'message' => 'Can\'t create Documentation!'], 500);
		else
			return response()->json(['type' => 'success', 'message' => 'Documentation created!'], 200);
    }
	
    public function ajaxUpdateAll(Request $request, DocumentationService $service, $id) {
		if (!$item = Documentation::find($id))
			return response()->json(['type' => 'error', 'message' => 'Documentation not found!'], 404);
		else if(!$service->UpdateAll($request->all(), $id))
			return response()->json(['type' => 'error', 'message' => 'Can\'t update Documentation!'], 500);
		else
			return response()->json(['type' => 'success', 'message' => 'Documentation updated!'], 200);
	}

	public function sortChild($parent, $orders){
		$orderNo = 1;
		foreach($orders as $order) {
			$idNa = (int)$order['id'];
			Documentation::find($idNa)->update(['order'=>$orderNo, 'parent_id'=>$parent]);
			if(isset($order['children']) && count($order['children'])){
				$this->sortChild($idNa, $order['children']);
			}
			$orderNo++;
		}
	}
    public function ajaxSort(Request $request, $id) {
		$orderNo = 1;
		foreach($request->get('order') as $order) {
			$idNa = (int)$order['id'];
			Documentation::find($idNa)->update(['order'=>$orderNo, 'parent_id'=>$id]);
			if(isset($order['children']) && count($order['children'])){
				$this->sortChild($idNa, $order['children']);
			}
			$orderNo++;
		}
		return response()->json(['type' => 'success', 'message' => 'Documentation updated!'], 200);
	}
	
	public function ajaxUpload(AjaxUploadDocumentetionRequest $request, DocumentationService $service) {
		$CKEditorFuncNum = $request->input('CKEditorFuncNum');
		$fileName = $service->StoreAndGetFileName($request->file('upload'));
		$response = "<script>window.parent.CKEDITOR.tools.callFunction({$CKEditorFuncNum}, '{$fileName}')</script>";
		
		echo $response;
	}

	public function publish($id) {
		if (!$item = Documentation::find($id)){
			return response()->json(['type' => 'error', 'message' => 'Documentation not found!'], 404);
		}else if (!$item->update(['status' => 'publish'])){
			return response()->json(['type' => 'error', 'message' => 'Can\'t publish  Documentation!'], 500);
		}else{
			return response()->json(['type' => 'success', 'message' => 'Documentation published!'], 200);
		}
    }

	public function draft($id) {
		if (!$item = Documentation::find($id)){
			return response()->json(['type' => 'error', 'message' => 'Documentation not found!'], 404);
		}else if (!$item->update(['status' => 'draft'])){
			return response()->json(['type' => 'error', 'message' => 'Can\'t set as draft!'], 500);
		}else{
			return response()->json(['type' => 'success', 'message' => 'Documentation successfully set as draft!'], 200);
		}
    }
}