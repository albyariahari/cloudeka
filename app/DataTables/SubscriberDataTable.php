<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

// Models
use App\Models\Subscriber;

class SubscriberDataTable extends DataTable {
    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($object) {
				$actions = [];
				$actions['deleteAction'] = route('admin.subscriber.destroy', $object->id);
				
				return view('layouts.action_table', $actions)->render();
			});
    }
	
    public function query(Subscriber $model) {
        $query = $model::select('*');
		
        return $this->applyScopes($query);
    }
	
    public function html() {
        return $this->builder()
            ->setTableId('subscriber-table')
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
	
    protected function getColumns() {
        return [
            Column::make('email')->name('email')
            , Column::make('created_at')->width(150)->addClass('text-center')->searchable(false)
            , Column::computed('action')->width(100)->addClass('text-center')->exportable(false)->printable(false)
        ];
    }
	
    protected function filename() {
        return 'Subscriber_'.date('YmdHis');
    }
}