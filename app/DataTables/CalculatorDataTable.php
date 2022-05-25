<?php

namespace App\DataTables;

use App\Models\Calculator;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CalculatorDataTable extends DataTable
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
            ->editColumn('package', function ($object) {
                if ($object->package === null) {
                    return '<i class="fas fa-minus"></i>';
                }
                return $object->package;
            })
            ->addColumn(
                'action',
                function ($object) {
                    return view('layouts.action_table', [
                        'viewAction'  => route('admin.calculator.show', [$object->id]),
                        'editAction'  => route('admin.calculator.edit', [$object->id]),
                        'deleteAction'  => route('admin.calculator.destroy', [$object->id]),
                    ])->render();

                    return view('layouts.action_table', compact('object'))->render();
                }
            )->rawColumns(['product', 'package', 'created_at', 'updated_at', 'action']);;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Calculator $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Calculator $model)
    {
        $query = $model::select(['calculators.*', 'packages.name as package', 'product_translations.title as product'])->leftJoin('packages', 'package_id', 'packages.id')->leftJoin('products', 'products.id', 'calculators.product_id')->leftJoin('product_translations', 'product_translations.product_id', '=', 'products.id')->where('product_translations.lang', locale_lang());
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
            ->setTableId('calculator-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
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
            Column::make('product')->name('product_translations.title'),
            Column::make('package')->name('packages.name')->addClass('text-center'),
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
        return 'Calculator_' . date('YmdHis');
    }
}
