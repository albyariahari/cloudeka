<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Model(s)
use App\Models\Product;
use App\Models\Setting;

// Request(s)
use App\Http\Requests\Admin\Setting\Update as UpdateSettingRequest;

// Services(s)
use App\Services\SettingService;

class SettingController extends Controller {
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit() {
        $settings = Setting::whereIn('name', [
			'company_name'
			, 'company_address'
			, 'company_email'
			, 'company_email2'
			, 'setting__map_latitude'
			, 'setting__map_longitude'
			, 'company_socmed_facebook'
			, 'company_socmed_instagram'
			, 'company_socmed_twitter'
			, 'setting__social_media_linkedin_link'
			, 'setting__social_media_youtube_link'
			, 'setting__seo_default_title'
			, 'setting__seo_default_keyword'
			, 'setting__seo_default_description'
			, 'system_copyright'
			, 'setting__success_story_display'
			, 'setting__call_center_display'
			, 'setting__notif_subject'
			, 'setting__notif_from'
			, 'setting__notif_to'
			, 'setting__notif_cc'
			, 'setting__notif_bcc'
			, 'setting__notif_body_quotation'
			, 'setting__notif_disclaimer'
			, 'setting__notif_banner'
			, 'setting__show_documentation'
			, 'setting__show_faq'
			, 'setting__calculator_link'
			, 'setting__cmd_display'
			, 'setting__notif_join_program_banner'
			, 'setting__notif_join_program_body'
			, 'setting__notif_join_program_disclaimer'
		])->get();

        foreach ($settings as $val)
            $setting[$val->name] = $val->value;
		
		$products = Product::whereHas('Calculators')->get();
		$arr = [];
		
		foreach ($products as $val) {
			$title = $val->translate('en')->title;
			$slug = $val->translate('en')->slug;
			$arr[$slug] = $title;
		}

        $this->setData([
			'page' => 'Setting'
			, 'setting' => $setting
			, 'calculators' => $arr
		]);

        return view('admin.setting.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request, SettingService $settingService) {
        $settingService->update($request);

        return redirect(route('admin.setting.website'))->withSuccess('Setting update successfully');
    }
}