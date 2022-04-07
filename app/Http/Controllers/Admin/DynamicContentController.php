<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Request
use App\Http\Requests\Admin\DynamicContent\Store as StoreDynamicContentRequest;
use App\Http\Requests\Admin\DynamicContent\Update as UpdateDynamicContentRequest;

// Datatables
use App\DataTables\DynamicContentDataTable;

// Models
use App\Models\ContentSetting;
use App\Models\DynamicContent;
use App\Models\Module;
use App\Models\Page;

// Services
use App\Services\DynamicContentService;

class DynamicContentController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware(['permission:Create Dynamic Content'])->only(['create', 'store']);
        $this->middleware(['permission:Edit Dynamic Content'])->only(['edit', 'update']);
        $this->middleware(['permission:Delete Dynamic Content'])->only(['destroy']);

        $id = $request->segment(3) ?? 0;
        $this->content_setting = null;
        if ($id > 0) {
            $this->content_setting = ContentSetting::findOrFail($id);
        }
        $this->contentable = [];
        if (isset($this->content_setting)) {
            if ($this->content_setting->contentable_type == 'page') {
                $this->contentable = Page::find($this->content_setting->contentable_id);
                $this->contentable->name = $this->contentable->title;
                $this->contentable->slug = str_replace(" ", "-", $this->contentable->title);
            } else {
                $this->contentable = Module::find($this->content_setting->contentable_id);
            }
        }

        $this->setData(["content_setting" => $this->content_setting, 'contentable' => $this->contentable]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($module, $content_id, DynamicContentDataTable $dataTable)
    {
        $this->setData(['page' => $this->contentable->name . ' - List']);
        return $dataTable->with('content_id', $content_id)->with('module', $module)->render('admin.content.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($module, $content)
    {
        $this->setData(['page' => 'Create New ' . $this->contentable->name]);

        return view('admin.content.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($module, StoreDynamicContentRequest $request, $content_id, DynamicContentService $dynamicContentService)
    {
        $content = $dynamicContentService->create($request);

        return redirect(route('admin.content.index', [$module, $content_id]))->withSuccess($this->contentable->name . ' created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit($module, Request $request, $content_id, $id)
    {
        $content = DynamicContent::findOrFail($id);

        $this->setData(["page" => 'Edit ' . $this->contentable->name, "lang" => $request->get('lang', env('APP_LOCALE_LANG', 'en')), 'content' => $content, 'languages' => languages()]);
        return view('admin.content.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update($module, UpdateDynamicContentRequest $request, $content_id, $id, DynamicContentService $dynamicContentService)
    {
        $content = $dynamicContentService->update($request, $content_id, $id);

        return redirect(route('admin.content.index', [$module, $content_id]))->withSuccess($this->contentable->name . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy($module, $content_id, $id)
    {
        $content = DynamicContent::where('contentable_id', $content_id)->findOrFail($id)->delete();

        return response()->json(["type" => 'success', "message" => $this->contentable->name . ' successfully deleted!'], 200);
    }
}
