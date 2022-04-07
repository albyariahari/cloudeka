<?php

namespace App\DataTables;

use App\Models\UseCase;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UseCaseDataTable extends DataTable {
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->addColumn(
                'action',
                function ($object) {
					$action['deleteAction'] = route('admin.use-cases.destroy', [$object->id]);
					
					if ($object->status === 1)
						$action['downAction'] = route('admin.use-cases.status', [$object->id, 0]);
					else
						$action['upAction'] = route('admin.use-cases.status', [$object->id, 1]);

                    foreach (languages() as $val)
                        $action["{$val}EditAction"] = route('admin.use-cases.edit', [$object->id])."?lang={$val}";

                    return view('layouts.action_table', $action)->render();
                }
            )
			->editColumn('desc', function ($object) {
				$str = strip_tags(html_entity_decode($object->desc));
				
				return strlen($str) > 50 ? substr($str, 0, 50).'...' : $str;
			})
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UseCase $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UseCase $model) {
        $query = $model::select([
							'use_cases.*'
							, 'clients.name AS client'
							, 'use_case_translations.id AS trans_id'
							, 'use_case_translations.description AS desc'
							, 'use_case_translations.lang'
						])
						->join('clients', 'clients.id', 'use_cases.client_id')
						->join('use_case_translations', 'use_case_translations.use_case_id', 'use_cases.id')
						->where('use_case_translations.lang', 'en');
		
        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html() {
        return $this->builder()
            ->setTableId('use-cases-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0, 'asc')
            ->buttons(
                Button::make('create'),
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
    protected function getColumns() {
        return [
            Column::make('client')->name('clients.name')
			, Column::make('desc')->name('use_case_translations.description')
            , Column::computed('action')->exportable(false)->printable(false)->width(120)->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() {
        return 'Use_Cases_' . date('YmdHis');
    }
}