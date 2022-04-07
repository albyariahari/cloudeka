<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function uploadImage(Request $request) {
		if ($request->hasFile('upload')) {
			$originName = $request->file('upload')->getClientOriginalName();
			$fileName = pathinfo($originName, PATHINFO_FILENAME);
			$extension = $request->file('upload')->getClientOriginalExtension();
			$fileName = $fileName.'_'.time().'.'.$extension;
			
			cloudekaStore('storage/desc_img/', $fileName);
			
			$CKEditorFuncNum = $request->input('CKEditorFuncNum');
			$url = asset("storage/desc_img/{$fileName}");
			
			$response = "<script>window.parent.CKEDITOR.tools.callFunction({$CKEditorFuncNum}, '{$url}')</script>";
			
			echo $response;
		}
	}
}
