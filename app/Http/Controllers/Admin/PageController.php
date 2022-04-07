<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Request
use App\Http\Requests\Admin\Page\Update as UpdatePageRequest;

// Datatables
use App\DataTables\PageDataTable;

// Models
use App\Models\Page;
use App\Models\Section;
use App\Services\PageService;

class PageController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['permission:Edit Page'])->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PageDataTable $dataTable)
    {
        return $dataTable->render('admin.page.index', ['page' => 'Page - List']);
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
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $pages = Page::findOrFail($id);
		
        $this->setData([
			'page' => "Edit Page Section: {$pages->title}", 
			'pages' => $pages, 
			'lang' => $request->get('lang', env('APP_LOCALE_LANG', 'en')), 
			'languages' => languages()
		]);

        return view('admin.page.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, $id, PageService $pageService)
    {
        $data = $pageService->update($request->all(), $id);

        $section = Section::findOrFail($id);

        return response()->json(["type" => 'success', "message" => 'Section ' . $section->name . ' successfully updated!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
