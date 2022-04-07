<?php

namespace App\DataTables;

use App\Models\CalculatorComponent;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CalculatorComponentDataTable extends DataTable
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
                    return view('layouts.action_table', [
                        'viewAction'  => route('admin.calculator.component.show', [$object->id]),
                        'listAction'  => route('admin.calculator.component.sub.index', [$object->id]),
                        'editAction'  => route('admin.calculator.component.edit', [$object->id]),
                        'deleteAction'  => route('admin.calculator.component.destroy', [$object->id]),
                    ])->render();

                    return view('layouts.action_table', compact('object'))->render();
                }
            )->rawColumns(['title', 'slug', 'created_at', 'updated_at', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CalculatorComponent $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(CalculatorComponent $model)
    {
        $query = $model::select(['calculator_components.*'])->where('parent_id', 0);
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
            ->setTableId('calculatorcomponent-table')
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
            Column::make('slug')->name('slug'),
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
        return 'CalculatorComponent_' . date('YmdHis');
    }
}
