<?php

namespace App\DataTables;

use App\Models\NewsCategory;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class NewsCategoryDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn(
                'action',
                function ($object) {
                    $action = [
                        'viewAction'  => route('admin.news.category.show', [$object->id]) . '?lang=' . env('APP_LOCALE_LANG', 'en'),
                        'deleteAction'  => route('admin.news.category.destroy', [$object->id]),
                    ];

                    foreach (languages() as $key => $value) {
                        $action[$value . 'EditAction'] = route('admin.news.category.edit', [$object->id]) . '?lang=' . $value;
                    }

                    return view('layouts.action_table', $action)->render();

                    return view('layouts.action_table', compact('object'))->render();
                }
            );
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\NewsCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(NewsCategory $model)
    {
        $query = $model::select(['news_categories.*', 'news_category_translations.title as title', 'parent_translations.title as parent_title'])
            ->leftJoin('news_categories as parent', 'parent.id', '=', 'news_categories.parent_id')
            ->leftJoin('news_category_translations', function ($join) {
                $join->on('news_category_translations.news_category_id', '=', 'news_categories.id')
                    ->where('news_category_translations.lang', locale_lang());
            })
            ->leftJoin('news_category_translations as parent_translations', function ($join) {
                $join->on('parent_translations.news_category_id', '=', 'parent.id')
                    ->where('parent_translations.lang', locale_lang());
            });
        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('newscategory-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('title')->name('title'),
            Column::make('parent_title')->name('parent_title'),
            Column::make('created_at')->name('created_at'),
            Column::make('updated_at')->name('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'NewsCategory_' . date('YmdHis');
    }
}
