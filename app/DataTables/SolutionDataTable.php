<?php

namespace App\DataTables;

use App\Models\Solution;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SolutionDataTable extends DataTable
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
                        'viewAction'  => route('admin.solution.show', [$object->id]) . '?lang=' . env('APP_LOCALE_LANG', 'en'),
                        'deleteAction'  => route('admin.solution.destroy', [$object->id]),
                    ];

                    foreach (languages() as $key => $value) {
                        $action[$value . 'EditAction'] = route('admin.solution.edit', [$object->id]) . '?lang=' . $value;
                    }

                    return view('layouts.action_table', $action)->render();

                    return view('layouts.action_table', compact('object'))->render();
                }
            );
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Solution $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Solution $model)
    {
        $query = $model::select(['solutions.id', 'solution_translations.title as title', 'solution_translations.slug as slug', 'solutions.created_at', 'solution_translations.updated_at', 'lang'])->leftJoin('solution_translations', 'solution_translations.solution_id', '=', 'solutions.id')->where('solution_translations.lang', locale_lang());
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
            ->setTableId('solution-table')
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
            Column::make('title')->name('solution_translations.title'),
            Column::make('slug')->name('solution_translations.slug'),
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
        return 'Solution_' . date('YmdHis');
    }
}
