<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

// Models
use App\Models\FaqItem;

class FaqItemDataTable extends DataTable {
    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
			->addIndexColumn()
            ->addColumn('action', function ($object) {
				$max = FaqItem::where('faq_id', $this->faqID)->orderBy('order', 'DESC')->first()->order;
				//$actions['viewAction'] = route('admin.faq.show', [$object->slug, $object->faq_id, $object->id]);
				$actions['deleteAction'] = route('admin.faq.item.destroy', [$this->slug, $this->faqID, $object->id]);
				
				if ($object->order > 1)
					$actions['sortUpAction'] = route('admin.faq.item.move', [$this->slug, $this->faqID, $object->id, 0]);
				
				if ($object->order < $max)
					$actions['sortDownAction'] = route('admin.faq.item.move', [$this->slug, $this->faqID, $object->id, 1]);
				
				$actions['editAction'] = route('admin.faq.item.edit', [$this->slug, $this->faqID, $object->id]);
				
				return view('layouts.action_table', $actions)->render();
			})
			->editColumn('title', function ($object) {
				return strlen($object->title) > 50 ? substr($object->title, 0, 50).'...' : $object->title;
			});
    }
	
    public function query(FaqItem $model) {
        $query = $model::select(['faq_items.*', 'faq_item_translations.title'])
						->join('faq_item_translations', 'faq_item_translations.faq_item_id', 'faq_items.id')
						->where('faq_item_translations.lang', $this->lang)
						->join('faqs', 'faqs.id', 'faq_items.faq_id')
						->where('faqs.id', $this->faqID)
						->join('faq_categories', 'faq_categories.id', 'faqs.category_id')
						->where('faq_categories.slug', $this->slug);
		
        return $this->applyScopes($query);
    }
	
    public function html() {
        return $this->builder()
            ->setTableId('faq-item-table')
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
            , Column::make('title')->name('faq_item_translations.title')
            , Column::make('created_at')->width(100)->addClass('text-center')->searchable(false)
            , Column::make('updated_at')->width(100)->addClass('text-center')->searchable(false)
            , Column::computed('action')->width(120)->addClass('text-center')->exportable(false)->printable(false)
        ];
    }
	
    protected function filename() {
        return 'Faq_Item_'.date('YmdHis');
    }
}