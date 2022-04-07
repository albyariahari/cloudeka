<?php

namespace App\Http\Controllers;

use App\Models\Documentation;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Page;
use App\Models\Product;
use App\Models\Solution;
use Illuminate\Http\Request;

class SitemapXmlController extends Controller
{
    public function index()
    {
        $pageHome = Page::where('anchor', 'home')->first();
        $pages = Page::whereNotIn('id', [1, 9, 10, 12, 14])->get();
        $products = Product::all();
        $solutions = Solution::all();
        $newsCategories = NewsCategory::all();
        $docs = Documentation::with('logs.user')->where('level', 0)->where('status', 'publish')->get();
        return response()->view('sitemap.index', [
            'pageHome' => $pageHome,
            'pages' => $pages,
            'products' => $products,
            'solutions' => $solutions,
            'newsCategories' => $newsCategories,
            'docs' => $docs
        ])->header('Content-Type', 'text/xml');
    }
}
