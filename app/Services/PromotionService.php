<?php

namespace App\Services;

use App\Services\GeneralService;
use Auth;
use DB;

// Model(s)
use App\Models\Promotion;
use App\Models\Product;

class PromotionService extends GeneralService {
	public function GetProducts($lang) {
		return Product::with([
			'translations' => function ($qry) use ($lang) {
				$qry->where('lang', $lang);
			}
		])->get()->pluck('title', 'id')->toArray();
	}
	
	public function Check($id, $lang) {
		$arr = [];
		
		if (!is_null($id) && (!$data = Promotion::with(['product', 'author', 'updater'])->find($id))) {
			$arr['result'] = false;
			$arr['url'] = route('admin.promotion.index');
			$arr['error'] = 'Promotion not found!';
		} else {
			$arr['result'] = true;
			$arr['data'] = !is_null($id) ? $data : null;
		}
		
		return $arr;
	}
	
    public function Create($input) {
        return DB::transaction(function () use ($input) {
            $input['author_id'] = Auth::id();
            $input['start_date'] = self::_ReformatDate($input['start_date'], 'd/m/Y');
			
			if (isset($input['end_date']))
				$input['end_date'] = self::_ReformatDate($input['end_date'], 'd/m/Y');
			
			if (isset($input['is_popup']))
				Promotion::query()->update(['is_popup' => 0]);
			
			if (!$input['image'] = GeneralService::StoreAndGetFileName($input['image']))
				return false;
			
            return Promotion::create(self::_MultilanguagesInput($input));
        });
    }

    public function Update($input, $id) {
        return DB::transaction(function () use ($input, $id) {
            $header['update_id'] = Auth::id();
			
			if (isset($input['product_id']))
				$header['product_id'] = $input['product_id'];
			
			if (isset($input['start_date']))
				$header['start_date'] = self::_ReformatDate($input['start_date'], 'd/m/Y');
			
			if (isset($input['end_date']))
				$header['end_date'] = self::_ReformatDate($input['end_date'], 'd/m/Y');
			
			if (isset($input['is_popup'])) {
				$header['is_popup'] = $input['is_popup'];
				Promotion::where('id', '<>', $id)->update(['is_popup' => 0]);
			}
			
            if (isset($input['image'])) {
				if (!$input['image'] = GeneralService::StoreAndGetFileName($input['image']))
					return false;
			}
			
			$data = Promotion::find($id); 
			
			return $data->translations()->updateOrCreate(['lang' => $input['lang']], $input) && $data->touch() && $data->update($header);
        });
    }
	
	public function Delete($id) {
		return DB::transaction(function () use ($id) {
			return Promotion::find($id)->delete();
        });
	}
	
	public function SetPopup($id, $action) {
		return DB::transaction(function () use ($id, $action) {
			$input['is_popup'] = (int) $action === 0 ? 0 : 1;
			
			if ($input['is_popup'] === 1)
				Promotion::where('id', '<>', $id)->update(['is_popup' => 0]);
			
			return Promotion::find($id)->update($input);
        });
	}
}