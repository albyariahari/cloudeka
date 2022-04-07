<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class UserDataTable extends DataTable
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
            ->addColumn(
                'action',
                function ($object) {
                    $action = [];
                    if (auth()->user()->can('Create User')) {
                        $action['viewAction'] = route('admin.user.show', [$object->id]);
                    }
                    if (auth()->user()->can('Edit User')) {
                        $action['editAction'] = route('admin.user.edit', [$object->id]);
                    }
                    if (auth()->user()->can('Delete User')) {
                        if (Auth::user()->id !== $object->id) {
                            $action['deleteAction'] = route('admin.user.destroy', [$object->id]);
                        }
                    }

                    if (count($action) === 0) {
                        return "No Action";
                    }
                    return view('layouts.action_table', $action)->render();

                    return view('layouts.action_table', compact('object'))->render();
                }
            );
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        $query = $model::select(['users.*', 'roles.name as role'])
            ->leftjoin('model_has_roles', 'model_has_roles.model_id', 'users.id')
            ->leftjoin('roles', 'model_has_roles.role_id', 'roles.id')
            ->where(function ($query) {
                if ($this->role_id !== null && $this->role_id > 0) {
                    $query->where('roles.id', $this->role_id);
                }
            });
        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('user-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
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
            Column::make('name'),
            Column::make('role')->name('roles.name'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'User_' . date('YmdHis');
    }
}
