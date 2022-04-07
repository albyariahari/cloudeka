<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Request
use App\Http\Requests\Admin\News\Store as StoreNewsRequest;
use App\Http\Requests\Admin\News\Update as UpdateNewsRequest;

// Datatables
use App\DataTables\NewsDataTable;

// Models
use App\Models\Tag;
use App\Models\News;
use App\Models\NewsCategory;
use App\Services\NewsService;

class NewsController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['permission:Create Product Category'])->only(['create', 'store']);
        // $this->middleware(['permission:Edit Product Category'])->only(['edit', 'update']);
        // $this->middleware(['permission:Delete Product Category'])->only(['destroy']);
        // $this->middleware(['permission:Show Product Category'])->only(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NewsDataTable $dataTable)
    {
        return $dataTable->render('admin.news.index', ['page' => 'News & Event - List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = NewsCategory::get();
        $tag = Tag::get();

        $tags = [];
        foreach ($tag as $key => $value) {
            $tags[] = [
                'value' => $value->title,
                'id' => $value->id
            ];
        }

        $this->setData(['page' => $request->get('type', 'news') === 'news' ? 'Create New News' : 'Create New Event', 'categories' => $categories, 'tags' => $tags]);
        return view('admin.news.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request, NewsService $newsService)
    {
        $news = $newsService->create($request);

        return redirect(route('admin.news.index'))->withSuccess('News created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, News $news)
    {
        $this->setData(["page" => 'Show Detail News', 'news' => $news, 'lang' => $request->get('lang', env('APP_LOCALE_LANG', 'en')), 'languages' => languages()]);
        return view('admin.news.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $categories = NewsCategory::get();
        $languages = languages();

        $tags = [];
        $tagExists = [];
        foreach ($news->Tags as $key => $value) {
            $tags[] = [
                'value' => $value->title,
                'id' => $value->id
            ];

            $tagExists[] = $value->id;
        }
        $news->Tags = json_encode($tags, true);
        $tag = Tag::whereNotIn('id', $tagExists)->get();
        foreach ($tag as $key => $value) {
            $tags[] = [
                'value' => $value->title,
                'id' => $value->id
            ];
        }
        $this->setData(["page" => $news->type === 'news' ? 'Edit News' : 'Edit Event', 'news' => $news, 'categories' => $categories, 'tags' => $tags, 'languages' => $languages,  'lang' => $request->get('lang', env('APP_LOCALE_LANG', 'en'))]);
        return view('admin.news.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, $id, NewsService $newsService)
    {
        $news = $newsService->update($request, $id);

        return redirect(route('admin.news.index'))->withSuccess('News update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        return response()->json(["type" => 'success', "message" => 'Mews successfully deleted!'], 200);
    }
}
