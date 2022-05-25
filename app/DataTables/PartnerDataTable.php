<?php

namespace App\DataTables;

use App\Models\Partner;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PartnerDataTable extends DataTable {
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->addColumn(
                'action',
                function ($object) {
					$action['editAction'] = route('admin.partners.edit', [$object->id]);
                    $action['deleteAction'] = route('admin.partners.destroy', [$object->id]);

                    return view('layouts.action_table', $action)->render();
                }
            )
            ->rawColumns(['title', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Partner $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Partner $model) {
        $query = $model::select('*');
		
        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html() {
        return $this->builder()
            ->setTableId('partner-table')
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
    protected function getColumns() {
        return [
            Column::make('name'),
            Column::computed('action')->exportable(false)->printable(false)->width(120)->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() {
        return 'Partners_' . date('YmdHis');
    }
}