<?php

namespace App\Services;

use Illuminate\Http\Request;
use DB;
use Auth;
use Str;

// Models
use App\Models\FaqCategory;

class FaqCategoryService {
	public function Check($id) {
		$arr = [];
		
		if (!$data = FaqCategory::with(['faqs'])->find($id)) {
			$arr['result'] = false;
			$arr['url'] = route('admin.faq.category.index');
			$arr['error'] = 'FAQ Category not found!';
		} else {
			$arr['result'] = true;
			$arr['title'] = $data->title;
			$arr['data'] = $data;
		}
		
		return $arr;
	}
	
    public function Create($input) {
        return DB::transaction(function () use ($input) {
			$input['author_id'] = Auth::id();
			$input['slug'] = Str::slug($input['title']);
			$input['order'] = (FaqCategory::get()->last()->order ?? 0) + 1;
			
			return FaqCategory::create($input);
        });
    }

    public function Update($input, $id) {
        return DB::transaction(function () use ($input, $id) {
			$input['update_id'] = Auth::id();
			$input['slug'] = Str::slug($input['title']);
			
			return FaqCategory::find($id)->update($input);
        });
    }
	
	public function Delete($id) {
        return DB::transaction(function () use ($id) {
			return FaqCategory::find($id)->delete();
        });
	}
}