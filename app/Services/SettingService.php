<?php

namespace App\Services;

use App\Services\GeneralService;
use Illuminate\Http\Request;
use Str;
use DB;

// Models
use App\Models\Benefit;
use App\Models\Product;
use App\Models\Setting;
use App\Models\UseCase;

class SettingService extends GeneralService
{
    public function update(Request $request)
    {
        DB::transaction(function () use ($request) {
            $input = $request->except('_method', '_token');
            foreach ($input as $key => $value) {
                $setting = Setting::where('name', $key)->firstOrFail();
                // Update Image Popup
                if ($key === 'setting__popup_info_image' && $request->hasFile('setting__popup_info_image')) {
                    $value = $request->setting__popup_info_image->store('uploads', 'public');
                }
				
				if ($key === 'setting__notif_banner')
					$value = self::StoreAndGetFileName($request->setting__notif_banner);
					
                $setting->value = $value ?? '';
                $setting->save();
            }

            return true;
        });
    }
}
