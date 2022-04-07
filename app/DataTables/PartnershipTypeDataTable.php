<?php

namespace App\DataTables;

use Auth;
use App\Models\PartnershipType;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PartnershipTypeDataTable extends DataTable
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
			->addIndexColumn()
            ->addColumn('action', function ($object) {
				$actions = [];
				
				//if (Auth::user()->can('Show Partnership Type'))
					//$actions['viewAction'] = route('admin.join-programs.partnership-types.show', [$object->id]);
				
				if (Auth::user()->can('Edit Partnership Type')) {
					$actions['editAction'] = route('admin.join-programs.partnership-types.edit', [$object->id]);
					
					$data = PartnershipType::get();
					
					if ($data->count() > 1) {
						if ($object->order > 1)
							$actions['moveUpAction'] = route('admin.join-programs.partnership-types.move', [$object->id]);
						
						if ($object->order < $data->last()->order)
							$actions['moveDownAction'] = route('admin.join-programs.partnership-types.move', [$object->id, 1]);
					}
					
					if ($object->is_active)
						$actions['deactivateAction'] = route('admin.join-programs.partnership-types.toggle', [$object->id]);
					else
						$actions['activateAction'] = route('admin.join-programs.partnership-types.toggle', [$object->id, 1]);
				}
				
				if (Auth::user()->can('Delete Partnership Type') && !$object->is_active)
					$actions['deleteAction'] = route('admin.join-programs.partnership-types.destroy', [$object->id]);
				
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
    public function query(PartnershipType $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('partnership-type-table')
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
                        Button::make('create')->disabled(Auth::user()->can('Create Partnership Type')),
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
            Column::make('order')->visible(false)->exportable(false)->printable(false), 
			Column::make('name'), 
			Column::make('code')->addClass('text-center'), 
			Column::make('created_at')->width(125)->addClass('text-center')->searchable(false), 
			Column::make('updated_at')->width(125)->addClass('text-center')->searchable(false), 
			Column::computed('action')->width(225)->addClass('text-center')->exportable(false)->printable(false), 
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Partnership_Type_' . date('YmdHis');
    }
}
