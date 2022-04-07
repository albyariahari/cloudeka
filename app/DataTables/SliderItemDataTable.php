<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

// Model(s)
use App\Models\SliderItem;

class SliderItemDataTable extends DataTable {
    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
			->addIndexColumn()
            ->addColumn('action', function ($object) {
				$max = SliderItem::where('slider_id', $this->sliderID)->orderBy('order', 'DESC')->first()->order;
				
				$actions['editAction'] = route('admin.slider.item.edit', [$this->sliderID, $object->id]);
				//$actions['viewAction'] = route('admin.slider.item.show', [$this->sliderID, $object->id]);
				$actions['deleteAction'] = route('admin.slider.item.destroy', [$this->sliderID, $object->id]);
				
				if ($object->order > 1)
					$actions['sortUpAction'] = route('admin.slider.item.move', [$this->sliderID, $object->id, 0]);
				
				if ($object->order < $max)
					$actions['sortDownAction'] = route('admin.slider.item.move', [$this->sliderID, $object->id, 1]);
				
				
				return view('layouts.action_table', $actions)->render();
			})
			->editColumn('title', function ($object) {
				return strlen($object->title) > 50 ? substr($object->title, 0, 50).'...' : $object->title;
			});
    }
	
    public function query(SliderItem $model) {
        $query = $model::select(['slider_items.*', 'slider_item_translations.title'])
						->join('slider_item_translations', 'slider_item_translations.slider_item_id', 'slider_items.id')
						->where('slider_item_translations.lang', $this->lang)
						->join('sliders', 'sliders.id', 'slider_items.slider_id')
						->where('sliders.id', $this->sliderID);
        
        return $query->applyScopes($query);
    }
	
    public function html() {
        return $this->builder()
            ->setTableId('slider-item-table')
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
            , Column::make('title')->name('slider_item_translations.title')
            , Column::make('created_at')->width(100)->addClass('text-center')->searchable(false)
            , Column::make('updated_at')->width(100)->addClass('text-center')->searchable(false)
            , Column::computed('action')->exportable(false)->printable(false)->width(120)->addClass('text-center'),
        ];
    }
	
    protected function filename() {
        return 'Slider_Item_'.date('YmdHis');
    }
}