<?php

namespace App\Http\Controllers;

use App\Models\PackageItem;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductTranslation;
use App\Models\Section;
use App\Models\SliderItem;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = LaravelLocalization::setLocale() ?? env('APP_LOCALE_LANG', 'en');
        $page_id = 3;
        $sections = Section::where('page_id', $page_id)->get();
        $slideshows = SliderItem::where('slider_id', 2)->get();
        $categories = ProductCategory::all();
        $this->pushData([
            'metadata' => convertToMetadata('section', $sections[0]->translate($lang)),
            'featured' => $sections[2]->translate($lang),
            'slideshows' => $slideshows,
            'product_categories' => [
                'title' => $sections[3]->translate($lang)->title,
                'data' => $categories
            ],
            'lang' => $lang
        ]);
        return view('product-list', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $lang = LaravelLocalization::setLocale() ?? env('APP_LOCALE_LANG', 'en');
        $page_id = 9;
        $sections = Section::where('page_id', $page_id)->get();
        $technology = $sections[0]->translate($lang);
        $useCase = $sections[1]->translate($lang);
        $benefit = $sections[2]->translate($lang);
        $solution = $sections[3]->translate($lang);        

        $productTranslation = ProductTranslation::where('slug', $slug)->where('lang', $lang)->firstOrFail();
        $productTranslationEN = ProductTranslation::where('product_id', $productTranslation->product_id)->where('lang', 'en')->firstOrFail();
        $product = $productTranslation->product;

        $package = $product->Packages->first();
        $packageItems = null;

        if($package){
            $packageItems = PackageItem::where('package_id', $package->id)->featured(true)->get();
        }            

        $this->pushData([
            'productTranslate' => $productTranslation,
            'product_slug' => $productTranslation->Product,
            'technology' => $technology,
            'useCase' => $useCase,
            'benefit' => $benefit,
            'solution' => $solution,
            'lang' => $lang,
            'packages' => $packageItems,
            'productTranslateEN' => $productTranslationEN,
        ]);
        return view('product-detail', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
