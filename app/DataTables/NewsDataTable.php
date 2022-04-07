<?php

namespace App\DataTables;

use App\Models\News;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class NewsDataTable extends DataTable
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
                        'viewAction'  => route('admin.news.show', [$object->id]) . '?lang=' . env('APP_LOCALE_LANG', 'en'),
                        'deleteAction'  => route('admin.news.destroy', [$object->id]),
                    ];

                    foreach (languages() as $key => $value) {
                        $action[$value . 'EditAction'] = route('admin.news.edit', [$object->id]) . '?lang=' . $value;
                    }

                    return view('layouts.action_table', $action)->render();

                    return view('layouts.action_table', compact('object'))->render();
                }
            );
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\News $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(News $model)
    {
        $query = $model::select(['news.*', 'news_translations.title as title', 'news_category_translations.title as category'])
            ->leftJoin('news_translations', function ($join) {
                $join->on('news_translations.news_id', '=', 'news.id')
                    ->where('news_translations.lang', locale_lang());
            })->leftJoin('news_categories', 'news_categories.id', '=', 'news.news_category_id')
            ->leftJoin('news_category_translations', function ($join) {
                $join->on('news_category_translations.news_category_id', '=', 'news_categories.id')
                    ->where('news_category_translations.lang', locale_lang());
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
            ->setTableId('news-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(4)
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
            Column::make('type')->name('type'),
            Column::make('category')->name('category'),
            Column::make('click_count')->name('click_count'),
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
        return 'News_' . date('YmdHis');
    }
}
