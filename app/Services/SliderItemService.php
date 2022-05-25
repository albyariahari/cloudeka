<?php

namespace App\Services;

use Illuminate\Http\Request;
use Auth;
use DB;

// Model(s)
use App\Models\Slider;
use App\Models\SliderItem;

class SliderItemService extends GeneralService {
	public function Check($parentID, $id) {
		$arr = [];
		
		if (!$parent = Slider::with(['items'])->find($parentID)) {
			$arr['result'] = false;
			$arr['url'] = route('admin.slider.index');
			$arr['error'] = 'Slider not found!';
		} else if (!is_null($id) && (!$data = $parent->items->find($id))) {
			$arr['result'] = false;
			$arr['url'] = route('admin.slider.item.index', [$parent->id]);
			$arr['error'] = 'Slider Item not found!';
		} else {
			$arr['result'] = true;
			$arr['parent'] = $parent;
			$arr['data'] = !is_null($id) ? $data : null;
		}
		
		return $arr;
	}
	
    public function create($input, $parentID) {
        return DB::transaction(function () use ($input, $parentID) {
			$data = Slider::find($parentID)->items();
			
            $input['author_id'] = Auth::id();
            $input['order'] = ($data->orderBy('order', 'DESC')->first()->order ?? 0) + 1;
			
            if (isset($input['image'])) {
				if (!$input['image'] = self::StoreDesktopAndMobile($input['image']))
					return false;
            }
			
            if (isset($input['video'])) {
				if (!$input['video'] = self::StoreAndGetFileName($input['video']))
					return false;
            }

            return $data->create(self::_MultilanguagesInput($input));
        });
    }

    public function update($input, $id) {
        return DB::transaction(function () use ($input, $id) {
			$header['update_id'] = Auth::id();
			
            if (isset($input['image'])) {
				if (!$header['image'] = self::StoreDesktopAndMobile($input['image']))
					return false;
            }
			
            if (isset($input['video'])) {
				if (!$header['video'] = self::StoreAndGetFileName($input['video']))
					return false;
            }
			
			$data = SliderItem::find($id);
			
			return $data->translations()->updateOrCreate(['lang' => $input['lang']], $input) && $data->touch() && $data->update($header);
        });
    }
	
	public function Delete($id) {
        return DB::transaction(function () use ($id) {
			return SliderItem::find($id)->delete();
        });
	}
}