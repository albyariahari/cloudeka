<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

// Models
use App\Models\FaqCategory;
use App\Models\Faq;

class FaqDataTable extends DataTable {
    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
			->addIndexColumn()
            ->addColumn('action', function ($object) {
				$max = FaqCategory::with(['faqs'])->where('slug', $this->slug)->first()->faqs()->orderBy('order', 'DESC')->first()->order;
				//$actions['viewAction'] = route('admin.faq.show', [$this->slug, $object->id]);
				$actions['listAction'] = route('admin.faq.item.index', [$this->slug, $object->id]);
				$actions['deleteAction'] = route('admin.faq.destroy', [$this->slug, $object->id]);
				
				if ($object->order > 1)
					$actions['sortUpAction'] = route('admin.faq.move', [$this->slug, $object->id, 0]);
				
				if ($object->order < $max)
					$actions['sortDownAction'] = route('admin.faq.move', [$this->slug, $object->id, 1]);
				
				$actions['editAction'] = route('admin.faq.edit', [$this->slug, $object->id]);
				
				return view('layouts.action_table', $actions)->render();
			});
    }
	
    public function query(Faq $model) {
        $query = $model::select(['faqs.*', 'faq_translations.title'])
						->join('faq_translations', 'faq_translations.faq_id', 'faqs.id')
						->where('faq_translations.lang', $this->lang)
						->join('faq_categories', 'faq_categories.id', 'faqs.category_id')
						->where('faq_categories.slug', $this->slug);
		
        return $this->applyScopes($query);
    }
	
    public function html() {
        return $this->builder()
            ->setTableId('faq-table')
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
            , Column::make('title')->name('faq_translations.title')
            , Column::make('created_at')->width(100)->addClass('text-center')->searchable(false)
            , Column::make('updated_at')->width(100)->addClass('text-center')->searchable(false)
            , Column::computed('action')->width(125)->addClass('text-center')->exportable(false)->printable(false)
        ];
    }
	
    protected function filename() {
        return 'Faq_'.date('YmdHis');
    }
}