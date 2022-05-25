<?php

namespace App\Services;

use Illuminate\Http\Request;
use Auth;
use DB;
use Str;

// Models
use App\Models\FaqCategory;
use App\Models\FaqItem;

class FaqItemService extends GeneralService {
	public function Check($slug, $parentID, $id) {
		$arr = [];
		
		if (!$grandparent = FaqCategory::with(['faqs.items.author', 'faqs.items.updater'])->where('slug', $slug)->first()) {
			$arr['result'] = false;
			$arr['url'] = route('admin.faq.category.index');
			$arr['error'] = 'FAQ Category not found!';
		} else if (!$parent = $grandparent->faqs->find($parentID)) {
			$arr['result'] = false;
			$arr['url'] = route('admin.faq.index', [$grandparent->slug]);
			$arr['error'] = 'FAQ not found!';
		} else if (!is_null($id) && (!$data = $parent->items->find($id))) {
			$arr['result'] = false;
			$arr['url'] = route('admin.faq.item.index', [$grandparent->slug, $parent->id]);
			$arr['error'] = 'FAQ Item not found!';
		} else {
			$arr['result'] = true;
			$arr['data'] = !is_null($id) ? $data : $parent;
		}
		
		return $arr;
	}
	
    public function Create($input, $slug, $parentID) {
        return DB::transaction(function () use ($input, $slug, $parentID) {
			$input['author_id'] = Auth::id();
			$input['slug'] = isset($input['slug']) ? strtolower($input['slug']) : Str::slug($input['title']);
			$input['order'] = (FaqItem::where('faq_id', $parentID)->get()->last()->order ?? 0) + 1;
			
			return FaqCategory::where('slug', $slug)->first()->faqs->find($parentID)->items()->create(self::_MultilanguagesInput($input));
        });
    }

    public function Update($input, $id) {
        return DB::transaction(function () use ($input, $id) {
			$header['update_id'] = Auth::id();
			
			$input['slug'] = isset($input['slug']) ? strtolower($input['slug']) : Str::slug($input['title']);
			
			$data = FaqItem::find($id);
			
			return $data->translations()->updateOrCreate(['lang' => $input['lang']], $input) && $data->touch() && $data->update($header);
        });
    }
	
	public function Delete($id) {
        return DB::transaction(function () use ($id) {
			return FaqItem::find($id)->delete();
        });
	}
}