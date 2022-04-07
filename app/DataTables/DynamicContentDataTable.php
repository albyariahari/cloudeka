<?php

namespace App\DataTables;

use App\Models\DynamicContent;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DynamicContentDataTable extends DataTable
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
                        'deleteAction'  => route('admin.content.destroy', [$this->module, $this->content_id, $object->id]),
                    ];

                    foreach (languages() as $key => $value) {
                        $action[$value . 'EditAction'] = route('admin.content.edit', [$this->module, $this->content_id, $object->id]) . '?lang=' . $value;
                    }

                    return view('layouts.action_table', $action)->render();

                    return view('layouts.action_table', compact('object'))->render();
                }
            )
            ->rawColumns(['title', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DynamicContent $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DynamicContent $model)
    {
        $query = $model::select(['dynamic_contents.*', 'dynamic_content_translations.title'])->leftJoin('dynamic_content_translations', 'dynamic_content_translations.dynamic_content_id', 'dynamic_contents.id')->where('dynamic_content_translations.lang', locale_lang())->where('contentable_type', 'module')->where('contentable_id', $this->content_id);
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
            ->setTableId('dynamiccontent-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1, 'asc')
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
            Column::make('title')->name('dynamic_content_translations.title'),
            Column::make('order')->name('order')->searchable(false),
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
        return 'DynamicContent_' . date('YmdHis');
    }
}
