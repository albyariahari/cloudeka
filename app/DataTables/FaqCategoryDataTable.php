<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

// Models
use App\Models\FaqCategory;

class FaqCategoryDataTable extends DataTable {
    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
			->addIndexColumn()
            ->addColumn('action', function ($object) {
				$max = FaqCategory::orderBy('order', 'DESC')->first()->order;
				//$actions['viewAction'] = route('admin.faq.category.show', [$object->id]);
				$actions['editAction'] = route('admin.faq.category.edit', [$object->id]);
				$actions['deleteAction'] = route('admin.faq.category.destroy', [$object->id]);
				
				if ($object->order > 1)
					$actions['sortUpAction'] = route('admin.faq.category.move', [$object->id, 0]);
				
				if ($object->order < $max)
					$actions['sortDownAction'] = route('admin.faq.category.move', [$object->id, 1]);
				
				return view('layouts.action_table', $actions)->render();
			});
    }
	
    public function query(FaqCategory $model) {
        $query = $model::select('*');
		
        return $this->applyScopes($query);
    }
	
    public function html() {
        return $this->builder()
            ->setTableId('faq-category-table')
            ->columns($this->getColumns())
			->addColumnBefore([
				'defaultContent' => 0
				, 'data' => 'DT_RowIndex'
				, 'name' => 'DT_RowIndex'
				, 'title' => 'No.'
				, 'width' => 50
				, 'class' => 'text-center'
				, 'searchable' => false
				, 'orderable' => false
			])
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
	
    protected function getColumns() {
        return [
            Column::make('order')->visible(false)->searchable(false)
            , Column::make('title')
            , Column::make('slug')
            , Column::make('created_at')->width(100)->addClass('text-center')
            , Column::make('updated_at')->width(100)->addClass('text-center')->searchable(false)
            , Column::computed('action')->width(100)->addClass('text-center')->exportable(false)->printable(false)
        ];
    }
	
    protected function filename() {
        return 'Faq_Category_'.date('YmdHis');
    }
}