<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;

// Request
use App\Http\Requests\Admin\News\Category\Store as StoreNewsCategoryRequest;
use App\Http\Requests\Admin\News\Category\Update as UpdateNewsCategoryRequest;

// Datatables
use App\DataTables\NewsCategoryDataTable;

// Models
use App\Models\NewsCategory;

class NewsCategoryController extends Controller
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
    public function index(NewsCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.news.category.index', ['page' => 'News Category - List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = NewsCategory::where('parent_id', 0)->get();
        $this->setData(['page' => 'Create New News Category', 'categories' => $categories]);
        return view('admin.news.category.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsCategoryRequest $request)
    {
        $input = $request->all();
        foreach (languages() as $value) {
            $input[$value] = $input;
            $input[$value]['slug'] = Str::slug($input['title']);
        }
        $newsCategory = NewsCategory::create($input);

        return redirect(route('admin.news.category.index'))->withSuccess('News category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = NewsCategory::findOrFail($id);

        $this->setData(["page" => 'Show Detail News Category', 'category' => $category]);
        return view('admin.news.category.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $category = NewsCategory::findOrFail($id);
        $categories = NewsCategory::where('parent_id', 0)->get();
        $languages = languages();

        $this->setData(["page" => 'Edit News Category', 'category' => $category, 'categories' => $categories, 'languages' => $languages,  'lang' => $request->get('lang', env('APP_LOCALE_LANG', 'en'))]);
        return view('admin.news.category.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsCategoryRequest $request, $id)
    {
        $params = $request->all();
        $params['slug'] = Str::slug($params['title']);
        $category = NewsCategory::findOrFail($id);
        $category->parent_id = $params['parent_id'];
        $category->save();
        $category->translate($params['language'])->update($params);

        return redirect(route('admin.news.category.index'))->withSuccess('News category update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = NewsCategory::where('parent_id', $id)->delete();
        $category = NewsCategory::findOrFail($id)->delete();

        return response()->json(["type" => 'success', "message" => 'News category successfully deleted!'], 200);
    }
}
