<?php

namespace App\Services;

use Illuminate\Http\Request;
use Auth;
use DB;

// Models
use App\Models\FaqCategory;
use App\Models\Faq;

class FaqService extends GeneralService {
	public function Check($slug, $id, $lang) {
		$arr = [];
		
		if (!$parent = FaqCategory::with(['faqs.items', 'faqs.author', 'faqs.updater'])->where('slug', $slug)->first()) {
			$arr['result'] = false;
			$arr['url'] = route('admin.faq.category.index');
			$arr['error'] = 'FAQ Category not found!';
		} else if (!is_null($id) && (!$data = $parent->faqs->find($id))) {
			$arr['result'] = false;
			$arr['url'] = route('admin.faq.index', [$parent->slug]);
			$arr['error'] = 'FAQ not found!';
		} else {
			$arr['result'] = true;
			$arr['data'] = !is_null($id) ? $data : $parent;
		}
		
		return $arr;
	}
	
    public function Create($input, $parentID) {
        return DB::transaction(function () use ($input, $parentID) {
			$input['author_id'] = Auth::id();
			$input['order'] = (Faq::where('category_id', $parentID)->get()->last()->order ?? 0) + 1;
			
			return FaqCategory::find($parentID)->faqs()->create(self::_MultilanguagesInput($input));
        });
    }

    public function Update($input, $id) {
        return DB::transaction(function () use ($input, $id) {
			$header['update_id'] = Auth::id();
			
			$data = Faq::find($id);
			
			return $data->update($header) && $data->touch() && $data->translations()->updateOrCreate(['lang' => $input['lang']], $input);
        });
    }
	
	public function delete($id) {
        return DB::transaction(function () use ($id) {
			return Faq::find($id)->delete();
        });
	}
}