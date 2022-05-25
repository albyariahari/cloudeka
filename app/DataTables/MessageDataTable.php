<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

// Models
use App\Models\Message;

class MessageDataTable extends DataTable {
    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($object) {
				$actions = [];
				$actions['viewAction'] = route('admin.message.show', $object->id);
				$actions['deleteAction'] = route('admin.message.destroy', $object->id);
				
				return view('layouts.action_table', $actions)->render();
			});
    }
	
    public function query(Message $model) {
        $query = $model::select('*');
		
        return $query->applyScopes($query);
    }
	
    public function html() {
        return $this->builder()
            ->setTableId('message-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(3, 'desc')
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
            Column::make('company_name')->title('Company')
            , Column::make('name')
            , Column::make('created_at')->width(100)->addClass('text-center')->searchable(false)
            , Column::make('updated_at')->width(100)->addClass('text-center')->searchable(false)
            , Column::computed('action')->width(100)->addClass('text-center')->exportable(false)->printable(false)
        ];
    }
	
    protected function filename() {
        return 'Message_' . date('YmdHis');
    }
}
