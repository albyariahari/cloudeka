<?php

namespace App\DataTables;

use App\Models\Feedback;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FeedbackDataTable extends DataTable
{
    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($object) {
				$actions = [];
				$actions['viewAction'] = route('admin.documentations.feedback.show', $object->id);
				$actions['deleteAction'] = route('admin.documentations.feedback.destroy', $object->id);
				
				return view('layouts.action_table', $actions)->render();
			});
    }
	
    public function query(Feedback $model) {
        //$query = $model::select('*');
        $query = $model::select([
            'feedbacks.*'
            , 'documentation_translations.name as documentation'
            , 'product_translations.title as product'
            ])
        ->leftJoin('documentations', 'documentations.id', 'feedbacks.documentation_id')
        ->leftJoin('documentation_translations', 'documentation_translations.documentation_id', '=', 'documentations.id')
        ->leftJoin('products', 'products.id', 'documentations.product_id')
        ->leftJoin('product_translations', 'product_translations.product_id', '=', 'products.id')
        ->where([
            'documentation_translations.lang'=> locale_lang(), 
            'product_translations.lang'=> locale_lang()
        ]);
		
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
            Column::make('product')->title('Product')
            , Column::make('documentation')->title('Documentation')
            , Column::make('rate')
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
