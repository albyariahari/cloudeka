<?php

namespace App\DataTables;

use App\Models\Documentation;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

use Illuminate\Support\Str;

class DocumentationDataTable extends DataTable {
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
					$action['deleteAction'] = route('admin.documentations.destroy', [$object->id]);
                    
                    if($object->status == 'draft'){
                        $action['publishAction'] = route('admin.documentations.publish', [$object->id]);
                    }else{
                        $action['draftAction'] = route('admin.documentations.draft', [$object->id]);
                    }

                    $title = Str::slug($object->title, '-');
                    $action['viewAction'] = route('documentation.preview', [$object->id, $title]);

                    foreach (languages() as $key => $val)
                        $action["{$val}EditAction"] = route('admin.documentations.edit', [$object->id])."?lang={$val}";

                    return view('layouts.action_table', $action)->render();
                }
            )
            ->rawColumns(['title', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UseCase $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Documentation $model) {
        $query = $model::select([
							'documentations.id'
							, 'documentation_translations.title'
                            , 'documentation_translations.name'
                            , 'documentations.status'
						])
						->join('documentation_translations', 'documentation_translations.documentation_id', 'documentations.id')
						->where('documentation_translations.lang', 'en')
						->whereNull('documentations.parent_id');
		
        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html() {
        return $this->builder()
            ->setTableId('documentations-table')
            ->columns($this->getColumns())
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

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns() {
        return [
            Column::make('name')->name('documentation_translations.name')
            , Column::computed('action')->exportable(false)->printable(false)->width(120)->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() {
        return 'Documentations_' . date('YmdHis');
    }
}