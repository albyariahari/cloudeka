<?php

namespace App\Services;

use App\Services\GeneralService;
use Illuminate\Http\Request;
use DB;

// Models
use App\Models\Section;

class PageService extends GeneralService {
    public function update($input, $id) {
        return DB::transaction(function () use ($input, $id) {
            if (isset($input['image_1'])) {
				if (!$input['image_1'] = self::StoreDesktopAndMobile($input['image_1']))
					return false;
            }
			
            if (isset($input['image_2'])) {
				if (!$input['image_2'] = GeneralService::StoreAndGetFileName($input['image_2']))
					return false;
            }
			
            if (isset($input['others']))
				$input['others'] = json_encode($input['others']);
			
            return Section::find($id)->translate($input['lang'])->update($input);
        });
    }
}