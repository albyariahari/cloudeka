<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Section;
use App\Models\SectionTranslation;
use App\Models\Setting;
use App\Models\Solution;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use stdClass;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $data = [];

    public function __construct()
    {
        $this->pushData(['lang' => LaravelLocalization::setLocale() ?? env('APP_LOCALE_LANG', 'en')]);
        $this->setPageTitles();
        $this->setProducts();
        $this->setSolutions();
        $this->setWebsiteSettings();
    }

    public function pushData($params)
    {
        if (sizeof($params) > 0) {
            $this->data = array_merge($this->data, $params);
        }
    }

    public function setData($params)
    {
        if (sizeof($params) > 0) {
            $this->data = array_merge($this->data, $params);
        }

        return $this->data;
    }

    public function response(string $str_code, string $message, $data = null, int $http_code = 200)
    {
        $response = [
            'str_code' => $str_code,
            'message' => $message,
        ];

        if (!is_null($data))
            $response['data'] = $data;

        return response()->json($response, $http_code);
    }

    public function setProducts()
    {
        $categories = ProductCategory::all();
        $products = Product::all();

        $this->pushData(["header_product_categories" => $categories, "header_products" => $products]);
    }

    public function setSolutions()
    {
        $solutions = Solution::all();

        $this->pushData(["header_solutions" => $solutions]);
    }
    public function setPageTitles()
    {
        $titles = Section::where('type', 'metadata')->select('title', 'sections.page_id')->leftJoin('section_translations', 'section_translations.section_id', 'sections.id')->where('lang', $this->data['lang'])->get()->groupBy('page_id');

        $this->pushData(['header_title_pages' => $titles]);
    }

    public function setWebsiteSettings()
    {
        $results = Setting::all();
        $data = new stdClass;
        foreach ($results as $key => $setting) {
            $data->{$setting->name} = $setting->value;
        }

        $this->pushData(['setting' => $data]);
    }
}
