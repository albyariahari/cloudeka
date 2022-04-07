<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

// Model(s)
use App\Models\Promotion;

class PromotionDataTable extends DataTable {
    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
			->addIndexColumn()
            ->addColumn('action', function ($object) {
				$actions['editAction'] = route('admin.promotion.edit', [$object->id]);
				$actions['deleteAction'] = route('admin.promotion.destroy', [$object->id]);
				
				if ($object->is_popup === 0)
					$actions['upAction'] = route('admin.promotion.ajax.set-popup', [$object->id, 1]);
				else
					$actions['downAction'] = route('admin.promotion.ajax.set-popup', [$object->id, 0]);
				
				return view('layouts.action_table', $actions)->render();
			})
            ->editColumn('is_popup', function ($object) {
				return $object->is_popup === 1 ? 'Yes' : 'No';
            });
    }
	
    public function query(Promotion $model) {
        $query = $model::select(['promotions.*', 'promotion_translations.title'])
						->join('promotion_translations', 'promotion_translations.promotion_id', 'promotions.id')
						->where('promotion_translations.lang', $this->lang);
		
        return $this->applyScopes($query);
    }
	
    public function html() {
        return $this->builder()
            ->setTableId('promotion-table')
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
			Column::make('title')->name('promotion_translations.title')
            , Column::make('is_popup')->name('promotions.is_popup')->width(25)->addClass('text-center')
            , Column::make('created_at')->width(100)->addClass('text-center')->searchable(false)
            , Column::make('updated_at')->width(100)->addClass('text-center')->searchable(false)
            , Column::computed('action')->exportable(false)->printable(false)->width(120)->addClass('text-center')
        ];
    }
	
    protected function filename() {
        return 'Promotions_'.date('YmdHis');
    }
}