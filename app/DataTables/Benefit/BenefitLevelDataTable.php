<?php

namespace App\DataTables\Benefit;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

use Auth;
use Carbon\Carbon;

// Model(s)
use App\Models\Benefit\BenefitLevel;

class BenefitLevelDataTable extends DataTable {
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
			->addIndexColumn()
            ->addColumn('action', function ($object) {
				$actions = [];
				
				if (Auth::user()->can('Show Benefit Level'))
					$actions['viewAction'] = route('admin.benefits.levels.show', [ $object->id ]);
				
				if (Auth::user()->can('Edit Benefit Level')) {
					if ($object->is_active)
						$actions['editAction'] = route('admin.benefits.levels.edit', [ $object->id ]);
					
					$data = BenefitLevel::get();
					
					if ($data->count() > 1) {
						if ($object->order > 1)
							$actions['moveUpAction'] = route('admin.benefits.levels.move', [ $object->id ]);
						
						if ($object->order < $data->last()->order)
							$actions['moveDownAction'] = route('admin.benefits.levels.move', [ $object->id, 1 ]);
					}
					
					if ($object->is_active)
						$actions['deactivateAction'] = route('admin.benefits.levels.toggle', [ $object->id ]);
					else
						$actions['activateAction'] = route('admin.benefits.levels.toggle', [ $object->id, 1 ]);
				}
				
				if (Auth::user()->can('Delete Benefit Level') && !$object->is_active)
					$actions['deleteAction'] = route('admin.benefits.levels.destroy', [ $object->id ]);
				
				return count($actions) ? view('layouts.action_table', $actions)->render() : 'No Action';
			})
			->editColumn('created_at', function ($object) {
				return date('Y-m-d', strtotime($object->created_at));
			})
			->editColumn('updated_at', function ($object) {
				return date('Y-m-d', strtotime($object->created_at));
			});
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PartnershipType $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BenefitLevel $model) {
		$query = $model->select([ '*' ]);
		
		if (!is_null($this->date_from) && is_null($this->date_to)) {
			$date_from = new Carbon($this->date_from);
			
			$query->where('created_at', '>=', $date_from->format('Y-m-d 00:00:00'));
		} else if (is_null($this->date_from) && !is_null($this->date_to)) {
			$date_to = new Carbon($this->date_to);
			
			$query->where('created_at', '<=', $date_to->format('Y-m-d 23:59:59'));
		} else if (!is_null($this->date_from) && !is_null($this->date_to)) {
			$date_from = new Carbon($this->date_from);
			$date_to = new Carbon($this->date_to);
			
			if ($this->date_from <= $this->date_to)
				$query->whereBetween('created_at', [ $date_from->format('Y-m-d 00:00:00'), $date_to->format('Y-m-d 23:59:59') ]);
			else
				$query->where('created_at', '>=', $date_from->format('Y-m-d 00:00:00'));
		}
		
		if (!is_null($this->is_active) && $this->is_active === '1')
			$query->where('is_active', 1);
		
        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html() {
        return $this->builder()
                    ->setTableId('benefit-levels-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax('', '
						let date_from = $("#date_from"), 
							date_to = $("#date_to"), 
							is_active = $("#is_active");
						
						if (date_from.length && date_to.length) {
							data.date_from = date_from.val();
							data.date_to = date_to.val();
						} else {
							date.date_from = null;
							date.date_to = null;
						}
						
						data.is_active = is_active.length ? is_active.is(":checked") | 0 : null;
					')
                    ->dom('Bfrtip')
                    ->orderBy(1, 'asc')
                    ->buttons(
                        Button::make('create')->enabled(Auth::user()->can('Create Benefit Level')), 
                        Button::make('export'), 
                        Button::make('print'), 
                        Button::make('reload'), 
                        Button::make('advancedFilter'), 
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns() {
        return [
            Column::make('DT_RowIndex')->title('No.')->addClass('text-center')->orderable(0)->searchable(0)->width(50),
            Column::make('order')->exportable(0)->printable(0)->visible(0), 
			Column::make('name'), 
			Column::make('code')->addClass('text-center'), 
			Column::make('created_at')->addClass('text-center')->width(125)->searchable(0), 
			Column::make('updated_at')->addClass('text-center')->width(125)->searchable(0), 
			Column::computed('action')->addClass('text-center')->width(225), 
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() {
        return 'Benefit_Levels_'.date('YmdHis');
    }
}