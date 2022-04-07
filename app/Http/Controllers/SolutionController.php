<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\SliderItem;
use App\Models\Solution;
use App\Models\SolutionTranslation;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SolutionController extends Controller
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
        $page_id = 4;
        $sections = Section::where('page_id', $page_id)->get();
        $slideshows = SliderItem::where('slider_id', 3)->get();
        $solutions = Solution::all();
        $this->pushData([
            'metadata' => convertToMetadata('section', $sections[0]->translate($lang)),
            'featured' => $sections[2]->translate($lang),
            'slideshows' => $slideshows,
            'solutions' => [
                'title' => $sections[3]->translate($lang)->title,
                'data' => $solutions
            ],
            'lang' => $lang
        ]);
        return view('solution-list', $this->data);
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
        $page_id = 10;
        $sections = Section::where('page_id', $page_id)->get();
        $whyUs = $sections[0]->translate($lang);
        $useCase = $sections[1]->translate($lang);
        $product = $sections[2]->translate($lang);
		// $bottomBanner = $sections[3]->translate($lang);
        $solutionTranslate =  SolutionTranslation::where('slug', $slug)->where('lang', $lang)->firstOrFail();

        $this->pushData([
            'solutionTranslate' => $solutionTranslate,
            'solution_slug' => $solutionTranslate->Solution,
            'whyUs' => $whyUs,
            'useCase' => $useCase,
            'product' => $product,
            'lang' => $lang
        ]);
        return view('solution-detail', $this->data);
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
