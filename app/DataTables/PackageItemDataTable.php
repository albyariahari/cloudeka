<?php

namespace App\DataTables;

use App\Models\PackageItem;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PackageItemDataTable extends DataTable
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
                    $actions = [
                        'viewAction'  => route('admin.package.item.show', [$this->package_id, $object->id]),
                        'editAction'  => route('admin.package.item.edit', [$this->package_id, $object->id]),
                        'deleteAction'  => route('admin.package.item.destroy', [$this->package_id, $object->id]),
                    ];

                    if($object->is_featured){
                        $actions['removeFeaturedAction'] = route('admin.package.item.remove-featured', [$this->package_id, $object->id]);
                    }else{
                        $actions['featuredAction'] = route('admin.package.item.set-featured', [$this->package_id, $object->id]);
                    }
                    
                    return view('layouts.action_table', $actions)->render();

                    return view('layouts.action_table', compact('object'))->render();
                }
            );
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PackageItem $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PackageItem $model)
    {
        $query = $model::select('package_items.*')->where('package_id', $this->package_id);
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
            ->setTableId('packageitem-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(3)
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
            Column::make('name')->name('name'),
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
        return 'PackageItem_' . date('YmdHis');
    }
}
