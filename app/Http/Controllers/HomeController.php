<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Intervention\Image\Image;
use Str;
use Illuminate\Support\Facades\Mail;

use App\Mail\SendJoinProgramNotification;

// Models
use App\Models\Client;
use App\Models\Documentation;
use App\Models\DocumentationTranslation;
use App\Models\DynamicContent;
use App\Models\DynamicContentTranslation;
use App\Models\FaqCategory;
use App\Models\Faq;
use App\Models\FaqItem;
use App\Models\Log;
use App\Models\Module;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsTranslation;
use App\Models\Page;
use App\Models\Partner;
use App\Models\PartnershipType;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Promotion;
use App\Models\Section;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\SliderItem;
use App\Models\Solution;
use App\Models\SolutionInterest;

// Request(s)
use App\Http\Requests\Web\JoinProgram\Send as JoinProgramSendRequest;

// Service(s)
use App\Services\PartnershipTypeService;
use App\Services\SolutionInterestService;
use App\Services\JoinProgramService;
use App\Services\Benefit\BenefitLevelService;
use App\Services\Benefit\BenefitTypeService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

use App\Http\Controllers\BreadcrumbTrail;

class HomeController extends Controller {
    private $__lang;

    public function __construct() {
        parent::__construct();

        $this->__lang = LaravelLocalization::setLocale() ?? env('APP_LOCALE_LANG', 'en');
    }

    public function media(Request $request, $file) {
        \Log::info($file);

        if (!empty($file)) {
            if ($request->has('path') && !empty($request->input('path'))) {
                $url = str_replace("-", "/", $request->input('path'));
                $url .= '/' . $file;
            } else {
                $url = $file;
            }

            if (strpos($file, '.svg') !== false) {
                $arrContextOptions = array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                    ),
                );

                return response(file_get_contents(cloudekaURL($url), false, stream_context_create($arrContextOptions)), 200)
                    ->header('Content-Type', 'image/svg+xml');
            } else {
                $image = \Image::cache(function ($image) use ($url) {
                    $arrContextOptions = array(
                        "ssl" => array(
                            "verify_peer" => false,
                            "verify_peer_name" => false,
                        ),
                    );

                    $image->make(file_get_contents(cloudekaURL($url), false, stream_context_create($arrContextOptions)));
                }, 10, true);

                return $image->response();
            }
        } else {
            return '';
        }
    }

    public function index() {
        $page_id = 1;
        $sections = Section::where('page_id', $page_id)->get();
        $slideshows = SliderItem::where('slider_id', 1)->orderBy('order', 'asc')->get();
        $products = Product::paginate(8);
        $successStories = DynamicContent::where('contentable_type', 'module')->where('contentable_id', 1)->get();
        $solutions = Solution::paginate(8);
        $clients = Client::where('is_shown', 1)->get();
        $partners = Partner::all();

        $this->pushData([
            'metadata' => convertToMetadata('section', $sections[0]->translate($this->__lang)),
            'whyChoose' => $sections[2]->translate($this->__lang),
            'slideshows' => $slideshows,
            'products' => [
                'title' => $sections[3]->translate($this->__lang)->title,
                'data' => $products
            ],
            'solutions' => [
                'title' => $sections[4]->translate($this->__lang)->title,
                'data' => $solutions
            ],
            'successStories' => [
                'title' => $sections[5]->translate($this->__lang)->title,
                'subtitle' => $sections[5]->translate($this->__lang)->subtitle,
                'data' => $successStories
            ],
            'clients' => [
                'title' => $sections[6]->translate($this->__lang)->title,
                'data' => $clients
            ],
            'partners' => [
                'title' => $sections[7]->translate($this->__lang)->title,
                'data' => $partners
            ],
            'news' => [
                'title' => $sections[8]->translate($this->__lang)->title,
                'bigSection' => News::orderBy('created_at', 'desc')->first(),
                'tripleRow' => News::orderBy('created_at', 'desc')->offset(1)->limit(3)->get()
            ],
            'bottomBanner' => $sections[9]->translate($this->__lang),
            'promotion' => Promotion::where('is_popup', 1)->where(function ($qry) {
                $qry->where('end_date', '>=', date('Y-m-d H:i:s'))->orWhereNull('end_date');
            })->orderBy('created_at', 'DESC')->first(),
            'page' => 'home',
            'lang' => $this->__lang
        ]);

        return view('homepage', $this->data);
    }

    public function whyUs()
    {
        $page_id = 2;
        $sections = Section::where('page_id', $page_id)->get();
        $milestone = DynamicContent::where('contentable_type', 'module')->where('contentable_id', 2)->pluck('id')->toArray();
        $milestone = DynamicContentTranslation::whereIn('dynamic_content_id', $milestone)->where('lang', $this->__lang)->orderBy('title', 'desc')->get();
        $certification = DynamicContent::where('contentable_type', 'module')->where('contentable_id', 3)->get();
        $awards = DynamicContent::where('contentable_type', 'module')->where('contentable_id', 4)->orderBy('created_at', 'asc')->pluck('id')->toArray();
        $awards = DynamicContentTranslation::whereIn('dynamic_content_id', $awards)->where('lang', $this->__lang)->orderBy('excerpt', 'desc')->orderBy('created_at', 'asc')->get()->groupBy('excerpt');
        $partners = Partner::all();

        $this->pushData([
            'metadata' => convertToMetadata('section', $sections[0]->translate($this->__lang)),
            'banner' => $sections[1]->translate($this->__lang),
            'whoWeAre' => $sections[2]->translate($this->__lang),
            'whyChoose' => $sections[3]->translate($this->__lang),
            'milestone' => [
                'title' => $sections[4]->translate($this->__lang)->title,
                'data' => $milestone
            ],
            'certification' => [
                'title' => $sections[5]->translate($this->__lang)->title,
                'data' => $certification
            ],
            'partOf' => $sections[6]->translate($this->__lang),
            'awards' => [
                'title' => $sections[7]->translate($this->__lang)->title,
                'data' => $awards
            ],
            'partners' => [
                'title' => $sections[8]->translate($this->__lang)->title,
                'data' => $partners
            ],
            'page' => 'home',
            'lang' => $this->__lang
        ]);

        return view('why-us', $this->data);
    }

    public function contactUs() {
        $lang = $this->__lang;
        $page_id = 8;
        $sections = Section::where('page_id', $page_id)->get();

        $chooses = DynamicContent::with([
            'translation' => function ($qry) use ($lang) {
                $qry->where('lang', $lang);
            }
        ])->where('contentable_type', 'module')->where('contentable_id', 6)->whereHas('translations', function ($qry) use ($lang) {
            $qry->where('lang', $lang);
        })->get()->pluck('title', 'id')->toArray();

        $hears = DynamicContent::with([
            'translation' => function ($qry) use ($lang) {
                $qry->where('lang', $lang);
            }
        ])->where('contentable_type', 'module')->where('contentable_id', 7)->whereHas('translations', function ($qry) use ($lang) {
            $qry->where('lang', $lang);
        })->get()->pluck('title', 'id')->toArray();

        $this->pushData([
            'metadata' => convertToMetadata('section', $sections[0]->translate($this->__lang)),
            'banner' => $sections[1]->translate($this->__lang),
            'form' => $sections[2]->translate($this->__lang),
            'headOffice' => $sections[3]->translate($this->__lang),
            'customerSupport' => $sections[4]->translate($this->__lang),
            'informationCenter' => $sections[5]->translate($this->__lang),
            'connect' =>  $sections[7]->translate($this->__lang),
            'office' => [
                'title' => $sections[6]->translate($this->__lang)->title,
                'data' => DynamicContent::where('contentable_type', 'module')->where('contentable_id', 5)->get()
            ],
            'chooses' => $chooses,
            'hearUs' => $hears,
            'page' => 'home',
            'lang' => $this->__lang
        ]);

        return view('contact-us', $this->data);
    }

    public function documentation()
    {
        $page_id = 6;
        $sections = Section::where('page_id', $page_id)->orderBy('order')->get();

        $this->pushData([
            'metadata' => convertToMetadata('section', $sections[0]->translate($this->__lang)), 'banner' => $sections[1]->translate($this->__lang), 'page' => 'faq', 'lang' => $this->__lang, 'categories' => ProductCategory::with('products.documentations')->whereHas('products.documentations')->get()
        ]);

        return view('documentation', $this->data);
    }

    public function documentationSearch(Request $request)
    {
        $page_id = 12;
        $sections = Section::where('page_id', $page_id)->orderBy('order')->get();
        $lang = $this->__lang;
        $src = request()->qry;
        $total = [];
        $total['all'] = 0;

        $categories = ProductCategory::with([
            'documentations.parent.parent', 'documentations.translations' => function ($qry) use ($lang, $src) {
                $qry->where('lang', $lang)->where(function ($qry2) use ($src) {
                    $qry2->where('name', 'LIKE', "%{$src}%")
                        ->orWhere('title', 'LIKE', "%{$src}%")
                        ->orWhere('description', 'LIKE', "%{$src}%");
                });
            }
        ])->whereHas('documentations.translations', function ($qry) use ($lang, $src) {
            $qry->where('lang', $lang)->where(function ($qry2) use ($src) {
                $qry2->where('name', 'LIKE', "%{$src}%")
                    ->orWhere('title', 'LIKE', "%{$src}%")
                    ->orWhere('description', 'LIKE', "%{$src}%");
            });
        })->get();

        foreach ($categories as $key => $cat) {
            foreach ($cat->documentations as $key2 => $doc) {
                if ($doc->translations->count()) {
                    if ($doc->level === 2)
                        $total[$cat->id][] = $doc->parent->parent->id;
                    else if ($doc->level === 1)
                        $total[$cat->id][] = $doc->parent->id;
                    else if ($doc->level === 0)
                        $total[$cat->id][] = $doc->id;
                }
            }

            $total[$cat->id] = array_unique($total[$cat->id]);
        }

        foreach ($total as $key => $val) {
            if ($key > 0)
                $total['all'] += count($val);
        }

        $this->pushData([
            'metadata' => convertToMetadata('section', $sections[0]->translate($this->__lang)), 'banner' => $sections[1]->translate($this->__lang), 'page' => 'faq', 'lang' => $this->__lang, 'categories' => $categories, 'search' => $src, 'total' => $total
        ]);

        return view('documentation-search', $this->data);
    }

    public function documentationDetail($id, $name, $childid = null, $childname = null, $grandchildid = null, $grandchildname = null)
    {
        \Counter::count($id);
        if ($grandchildid) {
            $parent = Documentation::with(['product'])->where('status', 'publish')->findOrFail($id);
            $children = $parent->Childs()->where('id', $childid)->first();
            $grandchild = $children->Childs()->where('id', $grandchildid)->first();

            $this->pushData([
                'parent' => $parent,
                'children' => $children,
                'grandchildata' => $grandchild,
                'view' => 'grandchild',
                'documentation_id' => $grandchildid
            ]);
        } else if ($childid) {
            $parent = Documentation::with(['product'])->where('status', 'publish')->findOrFail($id);
            $children = $parent->Childs()->where('id', $childid)->first();

            $this->pushData([
                'parent' => $parent,
                'children' => $children,
                'view' => 'child',
                'documentation_id' => $childid
            ]);
        } else {
            $this->pushData([
                'parent' => Documentation::with(['product', 'childs.childs'])->where('status', 'publish')->findOrFail($id),
                'view' => 'parent',
                'documentation_id' => $id
            ]);
        }

        return view('documentation-detail', $this->data);
    }

    public function documentationPreview($id, $name, $childid = null, $childname = null, $grandchildid = null, $grandchildname = null)
    {
        \Counter::count($id);
        if ($grandchildid) {
            $parent = Documentation::with(['product'])->findOrFail($id);
            $children = $parent->Childs()->where('id', $childid)->first();
            $grandchild = $children->Childs()->where('id', $grandchildid)->first();

            $this->pushData([
                'parent' => $parent,
                'children' => $children,
                'grandchildata' => $grandchild,
                'view' => 'grandchild',
                'documentation_id' => $grandchildid
            ]);
        } else if ($childid) {
            $parent = Documentation::with(['product'])->findOrFail($id);
            $children = $parent->Childs()->where('id', $childid)->first();

            $this->pushData([
                'parent' => $parent,
                'children' => $children,
                'view' => 'child',
                'documentation_id' => $childid
            ]);
        } else {
            $this->pushData([
                'parent' => Documentation::with(['product', 'childs.childs'])->findOrFail($id),
                'view' => 'parent',
                'documentation_id' => $id
            ]);
        }

        return view('documentation-preview', $this->data);
    }

    public function documentationDetail2()
    {
        return view('documentation-detail-2', $this->data);
    }

    public function faq()
    {
        $page_id = 7;
        $sections = Section::where('page_id', $page_id)->orderBy('order')->get();

        $this->pushData([
            'metadata' => convertToMetadata('section', $sections[0]->translate($this->__lang)), 'banner' => $sections[1]->translate($this->__lang), 'page' => 'faq', 'lang' => $this->__lang, 'categories' => FaqCategory::with('faqs.items')->whereHas('faqs.items')->get()
        ]);

        return view('faq', $this->data);
    }

    public function calculator(Request $request)
    {
        $calculator = $request->calculator;
        $redirect = $this->data['setting']->setting__calculator_link;

        if (isset($calculator) && !empty($calculator)) {
            $page_id = 5;
            $sections = Section::where('page_id', $page_id)->get();
            $this->pushData([
                'metadata' => convertToMetadata('section', $sections[0]->translate($this->__lang)),
                'banner' => $sections[1]->translate($this->__lang),
                'estimation' => $sections[2]->translate($this->__lang),
                'page' => 'price calculator',
                'lang' => $this->__lang
            ]);

            return view('prototype', $this->data);
        } else {
            return redirect()->route('calculator', ['calculator' => $redirect]);
        }
    }

    public function search(Request $request)
    {
        $string = strtolower($request->src);

        $pages = Page::with('sections.translations')->get();
        $products = Product::with('translations')->get();
        $solutions = Solution::with('translations')->get();
        $docs = Documentation::with('translations')->get();
        $faqs = FaqItem::with('translations')->get();
        $news = News::with(['translations', 'Tags'])->get();
        $res = [];
        $newArr = [];
        $pageArr = [];
        $productArr = [];
        $solutionArr = [];
        $docArr = [];
        $faqArr = [];
        $cnt = 0;

        foreach ($pages as $page) {
            foreach ($page->sections as $section) {
                if ($section->translations->count()) {
                    foreach (['title', 'subtitle', 'description'] as $field) {
                        if (strpos(strtolower($section->translations->first()->{$field}), $string) !== false) {
                            if (!count($pageArr) || $pageArr[count($pageArr) - 1]['id'] !== $page->id) {
                                $pageArr[] = $page;
                                $cnt++;
                            }
                        }
                    }
                }
            }
        }

        foreach ($news as $new) {
            if ($new->translations->count()) {
                foreach (['title', 'short_description', 'description'] as $field) {
                    if (strpos(strtolower($new->translations->first()->{$field}), $string) !== false) {
                        if (!count($newArr) || $newArr[count($newArr) - 1]['id'] !== $new->id) {
                            $newArr[] = $new;
                            $cnt++;
                        }
                    }
                }
            }
            if ($new->Tags()->count()) {
                foreach (['title'] as $field) {
                    foreach ($new->Tags as $key => $tag) {
                        if (strpos(strtolower($tag->{$field}), $string) !== false) {
                            if (!count($newArr) || $newArr[count($newArr) - 1]['id'] !== $new->id) {
                                $newArr[] = $new;
                                $cnt++;
                            }
                        }
                    }
                }
            }
        }

        foreach ($products as $product) {
            if ($product->translations->count()) {
                foreach (['title', 'slug', 'subtitle', 'excerpt', 'description'] as $field) {
                    if (strpos(strtolower($product->translations->first()->{$field}), $string) !== false) {
                        if (!count($productArr) || $productArr[count($productArr) - 1]['id'] !== $product->id) {
                            $productArr[] = $product;
                            $cnt++;
                        }
                    }
                }
            }
        }

        foreach ($solutions as $solution) {
            if ($solution->translations->count()) {
                foreach (['title', 'slug', 'subtitle', 'excerpt', 'description'] as $field) {
                    if (strpos(strtolower($solution->translations->first()->{$field}), $string) !== false) {
                        if (!count($solutionArr) || $solutionArr[count($solutionArr) - 1]['id'] !== $solution->id) {
                            $solutionArr[] = $solution;
                            $cnt++;
                        }
                    }
                }
            }
        }

        foreach ($docs as $doc) {
            if ($doc->translations->count()) {
                foreach (['name', 'title', 'description'] as $field) {
                    if (strpos(strtolower($doc->translations->first()->{$field}), $string) !== false) {
                        if ($doc->level === 2)
                            $new = $doc->parent->parent;
                        else if ($doc->level === 1)
                            $new = $doc->parent;
                        else
                            $new = $doc;

                        if (!count($docArr) || $docArr[count($docArr) - 1]['id'] !== $new->id) {
                            $docArr[] = $new;
                            $cnt++;
                        }
                    }
                }
            }
        }

        foreach ($faqs as $faq) {
            if ($faq->translations->count()) {
                foreach (['title', 'description'] as $field) {
                    if (strpos(strtolower($faq->translations->first()->{$field}), $string) !== false) {
                        if (!count($faqArr) || $faqArr[count($faqArr) - 1]['id'] !== $faq->id) {
                            $faqArr[] = $faq;
                            $cnt++;
                        }
                    }
                }
            }
        }

        $res['pages'] = $pageArr;
        $res['products'] = $productArr;
        $res['solutions'] = $solutionArr;
        $res['news'] = $newArr;
        $res['documentations'] = array_unique($docArr);
        $res['faqs'] = $faqArr;

        $page_id = 11;
        $sections = Section::where('page_id', $page_id)->get();

        $this->pushData([
            'metadata' => convertToMetadata('section', $sections[0]->translate($this->__lang)),
            'banner' => $sections[1]->translate($this->__lang),
            'page' => 'home',
            'lang' => $this->__lang,
            'results' => $res,
            'src' => $request->src,
            'cnt' => $cnt
        ]);

        return view('search', $this->data);
    }

    public function documentationAjaxGetProducts(Request $request)
    {
        $categoryID = $request->id;
        $products = Product::where('category_id', $categoryID)
            ->whereHas('documentations', function ($query) {
                $query->where('status', 'publish')->where('parent_id', null);
            })
            ->get();
        $data = [];

        foreach ($products as $key => $val) {
            $arr = [];
            $arr['id'] = $val->id;
            $arr['name'] = $val->translate($this->__lang)->title;
            $data[] = $arr;
        }

        return response()->json(['type' => 'success', 'data' => $data], 200);
    }

    public function documentationAjaxGetDocs(Request $request)
    {
        $productID = $request->id;
        $docs = Documentation::with('logs.user')->where('level', 0)->where('product_id', $productID)->where('status', 'publish')->get();
        $data['docs'] = [];
        $data['acts'] = [];

        foreach ($docs as $key => $val) {
            $arr = [];
            $arr['date'] = date('d/m/Y', strtotime($val->created_at));
            $arr['name'] = $val->name;
            $arr['url'] = route('documentation.detail', [$val->id, $this->__FormatName($val->name)]);
            $arr['hit'] = \Counter::show($val->id);
            $data['docs'][] = $arr;

            foreach ($val->logs()->orderBy('action_at', 'desc')->get() as $key2 => $val2) {
                $arr2 = [];
                $arr2['date'] = date('d/m/Y', strtotime($val2->action_at));
                $arr2['action'] = "<span>{$val2->user->name}</span> {$val2->action} <span>" . $val->translate($this->__lang)->name . '</span>';
                $data['acts'][] = $arr2;
            }
        }

        array_multisort(array_column($data['docs'], 'hit'), SORT_DESC, $data['docs']);

        return response()->json(['type' => 'success', 'data' => $data], 200);
    }

    public function documentationAjaxSearchProducts(Request $request)
    {
        $categoryID = $request->id;
        $src = $request->src;
        $lang = $this->__lang;
        $data = [];

        $base = Documentation::whereHas('translations', function ($qry) use ($lang, $src) {
            $qry->where('lang', $lang)->where(function ($qry2) use ($src) {
                $qry2->where('name', 'LIKE', "%{$src}%")
                    ->orWhere('title', 'LIKE', "%{$src}%")
                    ->orWhere('description', 'LIKE', "%{$src}%");
            });
        })->groupBy('product_id');
        $ids = $base->pluck('product_id')->toArray();
        $counts = $base->selectRaw('product_id, COUNT(product_id) as cnt')->where('level', 0)->pluck('cnt', 'product_id')->toArray();

        $products = Product::where('category_id', $categoryID)->whereIn('id', $ids)->get();

        foreach ($products as $key => $val) {
            if ($val->translations->count()) {
                $arr = [];
                $arr['id'] = $val->id;
                $arr['name'] = $val->translate($lang)->title;
                $arr['total'] = $counts[$val->id];
                $data[] = $arr;
            }
        }

        return response()->json(['type' => 'success', 'data' => $data], 200);
    }

    public function documentationAjaxSearchDocs(Request $request)
    {
        $productID = $request->id;
        $src = $request->src;
        $lang = $this->__lang;
        $list = [];

        $docs = Documentation::with([
            'parent.parent'
        ])->whereHas('translations', function ($qry) use ($lang, $src) {
            $qry->where('lang', $lang)->where(function ($qry2) use ($src) {
                $qry2->where('name', 'LIKE', "%{$src}%")
                    ->orWhere('title', 'LIKE', "%{$src}%")
                    ->orWhere('description', 'LIKE', "%{$src}%");
            });
        })->where(function ($qry) use ($productID) {
            if ((int) $productID !== 0)
                $qry->where('product_id', $productID);

            $qry->where('status', 'publish');
        })->orderBy('product_id')->orderBy('order')->get();

        foreach ($docs as $key => $val) {
            $doc = $val->level === 0 ? $val : ($val->level === 1 ? $val->parent : $val->parent->parent);
            $arr = [];
            $arr['date'] = date('d/m/Y', strtotime($doc->created_at));
            $arr['name'] = $doc->name;
            $arr['url'] = route('documentation.detail', [$doc->id, $this->__FormatName($doc->translate($lang)->name)]);
            $list[] = $arr;
        }

        $list = array_unique($list, SORT_REGULAR);
        $data['total'] = count($list);
        $data['rpp'] = 2;
        $data['page'] = $request->pg ?? 1;
        $data['start'] = ($data['page'] - 1) * $data['rpp'] + 1;
        $data['end'] = $data['rpp'] * $data['page'];
        $data['end'] = $data['end'] > $data['total'] ? $data['total'] : $data['end'];
        $data['pages'] = ceil($data['total'] / $data['rpp']);
        $data['docs'] = array_slice($list, $data['start'] - 1, $data['rpp']);

        return response()->json(['type' => 'success', 'data' => $data], 200);
    }

    public function faqAjaxGet(Request $request)
    {
        $lang = $this->__lang;
        $src = $request->qry;

        $items = FaqItem::with([
            'translations' => function ($qry) use ($lang, $src) {
                $qry->where('lang', $lang);
            }
        ])->whereHas('translations', function ($qry) use ($lang, $src) {
            $qry->where('lang', $lang)->where(function ($qry2) use ($src) {
                $qry2->where('title', 'like', "%{$src}%")->orWhere('description', 'like', "%{$src}%");
            });
        });

        $data['slug'] = $items->pluck('slug')->toArray();
        $data['faq'] = $items->pluck('faq_id')->toArray();
        $data['cat'] = Faq::whereIn('id', $data['faq'])->pluck('category_id')->toArray();

        return response()->json(['type' => 'success', 'data' => $data], 200);
    }

    public function news()
    {
        $page_id = 13;
        $sections = Section::where('page_id', $page_id)->orderBy('order')->get();
        $allNews = News::where('type', 'news')->count();
        $allEvent = News::where('type', 'event')->count();

        $this->pushData([
            'metadata' => convertToMetadata('section', $sections[0]->translate($this->__lang)),
            'banner' => $sections[1]->translate($this->__lang),
            'news' => [
                'title' => $sections[2]->translate($this->__lang),
                'bigSection' => News::where('type', 'news')->orderBy('created_at', 'desc')->first(),
                'tripleRow' => News::where('type', 'news')->orderBy('created_at', 'desc')->offset(1)->limit(3)->get(),
                'slideRow' => News::where('type', 'news')->orderBy('created_at', 'desc')->offset(4)->limit(4)->get(),
                'fourthRow' => News::where('type', 'news')->orderBy('created_at', 'desc')->offset(8)->limit(4)->get(),
                'startData' => 12,
                'count' => $allNews
            ],
            'event' => [
                'title' => $sections[3]->translate($this->__lang),
                'bigSection' => News::where('type', 'event')->orderBy('created_at', 'desc')->first(),
                'tripleRow' => News::where('type', 'event')->orderBy('created_at', 'desc')->offset(1)->limit(3)->get(),
                'slideRow' => News::where('type', 'event')->orderBy('created_at', 'desc')->offset(4)->limit(4)->get(),
                'fourthRow' => News::where('type', 'event')->orderBy('created_at', 'desc')->offset(8)->limit(4)->get(),
                'startData' => 12,
                'count' => $allEvent
            ],
            'lang' => $this->__lang
        ]);

        return view('news', $this->data);
    }

    public function Ajaxnews(Request $request)
    {
        $news = News::where('type', $request->get('type'))->where(function ($q) use ($request) {
            if (!is_null($request->get('category_slug'))) {
                $q->whereHas('Category.CategoryTranslate', function ($q) use ($request) {
                    $q->where('slug', $request->get('category_slug'))->where('lang', $this->__lang);
                });
            }
        })->orderBy('created_at', 'desc')->offset($request->get('row'))->limit($request->get('perpage'))->get();

        $response = '';
        foreach ($news as $key => $new) {
            $tag = '';
            foreach ($new->Tags as $item) {
                $tag .= '<a href="' . route('search', ['src' => $item->title]) . '" class="badge badge-primary">' . $item->title . '</a>';
            }
            $response .= '<div class="col-12 pb-4 pb-lg-0" data-aos="fade-up" data-aos-duration="500"  data-aos-delay="100">'
                . '<div class="card">'
                . '<div class="img-wrapper">'
                . '<img src="' . cloudekaUrl($new->translate($this->__lang)->outer_thumbnail) . '" alt="">'
                . '</div>'
                . '<div class="content-wrapper">'
                . '<div class=" tag-date">'
                . '<div class="tags">'
                . '<a href="' . route('news.category', $new->Category->translate($this->__lang)->slug) . '" class="badge badge-primary">' . $new->Category->translate($this->__lang)->title . '</a>'
                . $tag
                . '</div>'
                . '<strong class="date right">' . \Carbon\Carbon::parse($new->created_at)->format('d') . ' <span> ' . \Carbon\Carbon::parse($new->created_at)->format('F') . ' </span> ' . \Carbon\Carbon::parse($new->created_at)->format('Y') . '</strong>'
                . '</div>'
                . '<h1 class="mb-4"><a href="' . route('news.detail', [$new->Category->translate($this->__lang)->slug, $new->translate($this->__lang)->slug]) . '">' . $new->translate($this->__lang)->title . '</a></h1>'
                . '<p>' . $new->translate($this->__lang)->summary . '</p>'
                . '<div class="d-flex align-items-center mt-auto">'
                . '<img src="' . asset('/imgs/news/eye.svg') . '" class="mr-2" alt="">'
                . '<span>' . $new->click_count . '</span>'
                . '<img src="' . asset('/imgs/news/more.svg') . '" class="ml-auto mr-2" alt="">'
                . '</div>'
                . '</div>'
                . '</div>'
                . '</div>';
        }

        return response()->json($response);
    }

    public function newsCategory($category_slug)
    {
        $page_id = 13;
        $sections = Section::where('page_id', $page_id)->orderBy('order')->get();
        $category = NewsCategory::whereHas('CategoryTranslate', function ($q) use ($category_slug) {
            $q->where('slug', $category_slug);
        })->first();

        $this->pushData([
            'metadata' => convertToMetadata('section', $sections[0]->translate($this->__lang)),
            'category' => $category->translate($this->__lang),
            'banner' => $sections[1]->translate($this->__lang),
            'news' => [
                'title' => $sections[2]->translate($this->__lang),
                'bigSection' => News::whereHas('Category.CategoryTranslate', function ($q) use ($category_slug) {
                    $q->where('slug', $category_slug)->where('lang', $this->__lang);
                })->where('type', 'news')->orderBy('created_at', 'desc')->first(),
                'tripleRow' => News::whereHas('Category.CategoryTranslate', function ($q) use ($category_slug) {
                    $q->where('slug', $category_slug)->where('lang', $this->__lang);
                })->where('type', 'news')->orderBy('created_at', 'desc')->offset(1)->limit(3)->get(),
                'slideRow' => News::whereHas('Category.CategoryTranslate', function ($q) use ($category_slug) {
                    $q->where('slug', $category_slug)->where('lang', $this->__lang);
                })->where('type', 'news')->orderBy('created_at', 'desc')->offset(4)->limit(4)->get(),
                'fourthRow' => News::whereHas('Category.CategoryTranslate', function ($q) use ($category_slug) {
                    $q->where('slug', $category_slug)->where('lang', $this->__lang);
                })->where('type', 'news')->orderBy('created_at', 'desc')->offset(8)->limit(4)->get(),
                'startData' => 12,
                'count' =>  News::whereHas('Category.CategoryTranslate', function ($q) use ($category_slug) {
                    $q->where('slug', $category_slug)->where('lang', $this->__lang);
                })->where('type', 'news')->count()
            ],
            'event' => [
                'title' => $sections[3]->translate($this->__lang),
                'bigSection' => News::whereHas('Category.CategoryTranslate', function ($q) use ($category_slug) {
                    $q->where('slug', $category_slug)->where('lang', $this->__lang);
                })->where('type', 'event')->orderBy('created_at', 'desc')->first(),
                'tripleRow' => News::whereHas('Category.CategoryTranslate', function ($q) use ($category_slug) {
                    $q->where('slug', $category_slug)->where('lang', $this->__lang);
                })->where('type', 'event')->orderBy('created_at', 'desc')->offset(1)->limit(3)->get(),
                'slideRow' => News::whereHas('Category.CategoryTranslate', function ($q) use ($category_slug) {
                    $q->where('slug', $category_slug)->where('lang', $this->__lang);
                })->where('type', 'event')->orderBy('created_at', 'desc')->offset(4)->limit(4)->get(),
                'fourthRow' => News::whereHas('Category.CategoryTranslate', function ($q) use ($category_slug) {
                    $q->where('slug', $category_slug)->where('lang', $this->__lang);
                })->where('type', 'event')->orderBy('created_at', 'desc')->offset(8)->limit(4)->get(),
                'startData' => 12,
                'count' => News::whereHas('Category.CategoryTranslate', function ($q) use ($category_slug) {
                    $q->where('slug', $category_slug)->where('lang', $this->__lang);
                })->where('type', 'event')->count()
            ],
            'category_slug' => $category_slug,
            'lang' => $this->__lang
        ]);

        return view('news', $this->data);
    }

    public function newsDetail($category_slug, $slug)
    {
        $lang = LaravelLocalization::setLocale() ?? env('APP_LOCALE_LANG', 'en');

        $page_id = 14;
        $sections = Section::where('page_id', $page_id)->orderBy('order')->get();
        $newsTranslation = NewsTranslation::with(['news.Category'])->where([
            'slug' => $slug,
            'lang' => $lang
        ])->firstOrFail();
        $news = $newsTranslation->News;
        $news->click_count = $news->click_count + 1;
        $news->save();
        $newsList = News::with(['category'])->where('id', '!=', $newsTranslation->News->id)->orderBy('created_at', 'desc')->limit(3)->get();

        $this->pushData([
            'newsTranslation' => $newsTranslation,
            'news' => $newsList,
            'banner' => $sections[0]->translate($this->__lang),
            'lang' => $this->__lang, 
			'categories' => [
				'en' => $news->category->translate('en')->slug, 
				'id' => $news->category->translate('id')->slug
			], 
			'slugs' => [
				'en' => $news->translate('en')->slug, 
				'id' => $news->translate('id')->slug
			]
        ]);
		
        return view('news-detail', $this->data);
    }

    private function __FormatName($name) {
        return Str::slug(strtolower($name));
    }

    public function joinProgram(PartnershipTypeService $partnershipTypeService, SolutionInterestService $solutionInterestService) {
		$page = Page::where('anchor', 'join-program')->first();
        $sections = $page->sections;
		
        $this->pushData([
            'metadata' => $page->only(['meta_title', 'meta_keyword', 'meta_description']), 
            'banner' => $sections[0]->translate($this->__lang), 
            'top' => $sections[1]->translate($this->__lang), 
            'form' => $sections[2]->translate($this->__lang), 
            'lang' => $this->__lang, 
			'partnershipTypes' => $partnershipTypeService->get(), 
			'solutionInterests' => $solutionInterestService->get(), 
        ]);

        return view('join-program', $this->data);
    }
	
	public function joinProgramSend(JoinProgramService $service, JoinProgramSendRequest $req) {
		if ($data = $service->create($req->all())) {
			$notif = $service->GetNotification();
			
			$dataAPI = [
				'fullname' => $data->name, 
				'email' => $data->email, 
				'job_title' => $data->job_title, 
				'job_function' => $data->job_function, 
				'phone' => $data->phone, 
				'partnership_type' => $data->partnershipTypeNames, 
				'solution_interest' => $data->solutionInterestNames, 
			];
			
			/*$curl = curl_init('/partnership/join');
			curl_setopt($curl, CURLOPT_HEADER, TRUE);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
			curl_setopt($curl, CURLOPT_MAXREDIRS, 3);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 300);
			curl_setopt($curl, CURLOPT_TIMEOUT, 300);
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt($curl, CURLOPT_POSTFIELDS, $dataAPI);
			$response = curl_exec($curl);
			curl_close($curl);*/
			
			//$subject = Setting::where('name', 'setting__notif_subject')->first()->value;
			$subject = 'Cloudeka Partner Network Email Notification';
			$from = Setting::where('name', 'setting__notif_from')->first()->value;
			
			if ($subject && $from) {
				$mail['subject'] = $subject;
				$mail['from'] = $from;
				$mail['to'] = $data->email;
				$mail['cc'] = Setting::where('name', 'setting__notif_cc')->first()->value;
				$mail['bcc'] = Setting::where('name', 'setting__notif_bcc')->first()->value;
				$mail['data'] = $dataAPI;
				$mail['banner'] = Setting::where('name', 'setting__notif_join_program_banner')->first()->value;
				$mail['body'] = Setting::where('name', 'setting__notif_join_program_body')->first()->value;
				$mail['disclaimer'] = Setting::where('name', 'setting__notif_join_program_disclaimer')->first()->value;
				$mail['socMed']['fb'] = Setting::where('name', 'company_socmed_facebook')->first()->value;
				$mail['socMed']['ig'] = Setting::where('name', 'company_socmed_instagram')->first()->value;
				$mail['socMed']['li'] = Setting::where('name', 'setting__social_media_linkedin_link')->first()->value;
				$mail['socMed']['tw'] = Setting::where('name', 'company_socmed_twitter')->first()->value;
				$mail['socMed']['yt'] = Setting::where('name', 'setting__social_media_youtube_link')->first()->value;
				
				try {
					\Mail::send(new SendJoinProgramNotification($mail));
				} catch (Exception $ex) {
					return response()->json([ 'message' => $ex->getMessage(), 'type' => 'error' ], 500);
				}
			}
			
			return Response::json([
				'type' => $notif->title, 
				'message' => $notif->description, 
				'data' => $data, 
			], 201);
		} else {
			$notif = $service->GetNotification(0);
			
			return Response::json([
				'type' => $notif->title, 
				'message' => $notif->description, 
			], 500);
		}
	}

    public function becomePartner(BenefitLevelService $levelService, BenefitTypeService $typeService) {
		$slug = 'become-partner';
		$page = Page::where('anchor', $slug)->first();
        $sections = $page->sections;
		
        if($this->__lang == 'en'){
            $reseller_type = 1;
            $whoesales_type = 2;
        }else{
            $reseller_type = 3;
            $whoesales_type = 4;
        }

        $this->pushData([
            'metadata' => $page->only(['meta_title', 'meta_keyword', 'meta_description']), 
            'slideshows' => Slider::where('slug', $slug)->first()->items()->orderBy('order')->get(), 
			'top1' => $sections[1]->translate($this->__lang), 
			'top2' => $sections[2]->translate($this->__lang), 
			'middle' => $sections[3]->translate($this->__lang), 
			'becomePartners' => Module::where('slug', $slug)->first()->dynamicContents,  
			'bottom' => $sections[4]->translate($this->__lang), 
			'table1' => [
				'main' => $sections[5]->translate($this->__lang), 
				'reseller' => [
					'content' => $sections[6]->translate($this->__lang), 
					'tnc' => $sections[7]->translate($this->__lang),
                    'columns' => \App\Models\Partners\PartnerColumn::where('type_id', $reseller_type)->get(),
                    'rows' =>  \App\Models\Partners\PartnerRow::where('type_id', $reseller_type)->get(), 
				], 
				'wholesales' => [
					'content' => $sections[8]->translate($this->__lang), 
					'tnc' => $sections[9]->translate($this->__lang), 
                    'columns' => \App\Models\Partners\PartnerColumn::where('type_id', $whoesales_type)->get(),
                    'rows' =>  \App\Models\Partners\PartnerRow::where('type_id', $whoesales_type)->get(), 
				], 
			], 
			'table2' => [
				'main' => $sections[10]->translate($this->__lang), 
				'reseller' => [
					'tnc' => $sections[11]->translate($this->__lang), 
				], 
				'wholesales' => [
					'tnc' => $sections[12]->translate($this->__lang), 
				], 
			], 
			'levels' => $levelService->Get(), 
			'types' =>  $typeService->GetByLang($this->__lang), 
            'lang' => $this->__lang, 
			'bpColumns' => \App\Models\Partners\PartnerColumn::get(), 
			'bpRows' => \App\Models\Partners\PartnerRow::get(), 
        ]);

        return view('become-partner', $this->data);
    }
    public function pageErrors()
    {
        $page_id = 1;
        $sections = Section::where('page_id', $page_id)->get();
        $slideshows = SliderItem::where('slider_id', 1)->orderBy('order', 'asc')->get();
        $products = Product::paginate(8);
        $successStories = DynamicContent::where('contentable_type', 'module')->where('contentable_id', 1)->get();
        $solutions = Solution::paginate(8);
        $clients = Client::where('is_shown', 1)->get();
        $partners = Partner::all();

        $this->pushData([
            'metadata' => convertToMetadata('section', $sections[0]->translate($this->__lang)),
            'whyChoose' => $sections[2]->translate($this->__lang),
            'slideshows' => $slideshows,
            'products' => [
                'title' => $sections[3]->translate($this->__lang)->title,
                'data' => $products
            ],
            'solutions' => [
                'title' => $sections[4]->translate($this->__lang)->title,
                'data' => $solutions
            ],
            'successStories' => [
                'title' => $sections[5]->translate($this->__lang)->title,
                'subtitle' => $sections[5]->translate($this->__lang)->subtitle,
                'data' => $successStories
            ],
            'clients' => [
                'title' => $sections[6]->translate($this->__lang)->title,
                'data' => $clients
            ],
            'partners' => [
                'title' => $sections[7]->translate($this->__lang)->title,
                'data' => $partners
            ],
            'news' => [
                'title' => $sections[8]->translate($this->__lang)->title,
                'bigSection' => News::orderBy('created_at', 'desc')->first(),
                'tripleRow' => News::orderBy('created_at', 'desc')->offset(1)->limit(3)->get()
            ],
            'bottomBanner' => $sections[9]->translate($this->__lang),
            'promotion' => Promotion::where('is_popup', 1)->where(function ($qry) {
                $qry->where('end_date', '>=', date('Y-m-d H:i:s'))->orWhereNull('end_date');
            })->orderBy('created_at', 'DESC')->first(),
            'page' => 'home',
            'lang' => $this->__lang
        ]);
        return view('errors.404', $this->data);
    }
}