<?php

namespace App\DataTables;

use Auth;
use App\Models\JoinProgram;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class JoinProgramDataTable extends DataTable
{
    /**
     * List of columns to be printed.
     *
     * @var string|array
     */
	protected $printColumns = [
		[
			'data' => 'DT_RowIndex', 
			'title' => 'No.', 
		], 
		[
			'data' => 'name', 
			'title' => 'Name', 
		], 
		[
			'data' => 'email', 
			'title' => 'Email', 
		], 
		[
			'data' => 'job_title', 
			'title' => 'Job Title', 
		], 
		[
			'data' => 'job_function', 
			'title' => 'Job Function', 
		], 
		[
			'data' => 'phone', 
			'title' => 'Phone', 
		], 
		[
			'data' => 'partnership_type_names', 
			'title' => 'Partnership Types', 
		], 
		[
			'data' => 'solution_interest_names', 
			'title' => 'Solution Interests', 
		], 
		[
			'data' => 'sent_at', 
			'title' => 'Sent At', 
		], 
	];
	
    /**
     * List of columns to be exported.
     *
     * @var string|array
     */
	protected $exportColumns = [
		[
			'data' => 'DT_RowIndex', 
			'title' => 'No.', 
		], 
		[
			'data' => 'name', 
			'title' => 'Name', 
		], 
		[
			'data' => 'email', 
			'title' => 'Email', 
		], 
		[
			'data' => 'job_title', 
			'title' => 'Job Title', 
		], 
		[
			'data' => 'job_function', 
			'title' => 'Job Function', 
		], 
		[
			'data' => 'phone', 
			'title' => 'Phone', 
		], 
		[
			'data' => 'partnership_type_names', 
			'title' => 'Partnership Types', 
		], 
		[
			'data' => 'solution_interest_names', 
			'title' => 'Solution Interests', 
		], 
		[
			'data' => 'sent_at', 
			'title' => 'Sent At', 
		], 
	];
	
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
				
				if (Auth::user()->can('Show Join Program'))
					$actions['viewAction'] = route('admin.join-programs.messages.show', [$object->id]);
				
				if (Auth::user()->can('Delete Join Program'))
					$actions['deleteAction'] = route('admin.join-programs.messages.destroy', [$object->id]);
				
				return count($actions) ? view('layouts.action_table', $actions)->render() : 'No Action';
			})
			->editColumn('sent_date', function ($object) {
				return date('Y-m-d', strtotime($object->sent_date));
			});
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PartnershipType $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(JoinProgram $model)
    {
		$query = $model->select(['*', 'sent_at AS sent_date']);
		
		if (!is_null($this->date_from) && is_null($this->date_to)) {
			$date_from = new Carbon($this->date_from);
			
			$query->where('sent_at', '>=', $date_from->format('Y-m-d 00:00:00'));
		} else if (is_null($this->date_from) && !is_null($this->date_to)) {
			$date_to = new Carbon($this->date_to);
			
			$query->where('sent_at', '<=', $date_to->format('Y-m-d 23:59:59'));
		} else if (!is_null($this->date_from) && !is_null($this->date_to)) {
			$date_from = new Carbon($this->date_from);
			$date_to = new Carbon($this->date_to);
			
			if ($this->date_from <= $this->date_to)
				$query->whereBetween('sent_at', [$date_from->format('Y-m-d 00:00:00'), $date_to->format('Y-m-d 23:59:59')]);
			else
				$query->where('sent_at', '>=', $date_from->format('Y-m-d 00:00:00'));
		}
		
		if (!is_null($this->email))
			$query->where('email', $this->email);
		
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
                    ->setTableId('join-program-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax('', '
						let date_from = $("#date_from"), 
							date_to = $("#date_to"), 
							email = $("#email");
						
						if (date_from.length && date_to.length) {
							data.date_from = date_from.val();
							data.date_to = date_to.val();
						} else {
							date.date_from = null;
							date.date_to = null;
						}
						
						data.email = email.length ? email.val() : null;
					')
                    ->dom('Bfrtip')
                    ->orderBy(4)
                    ->buttons(
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload'), 
                        Button::make('advancedFilter'), 
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
			Column::make('DT_RowIndex')->addClass('text-center')->orderable(0)->searchable(0)->title('No.')->width(50), 
			Column::make('name'), 
			Column::make('email')->addClass('text-center'), 
			Column::make('phone')->addClass('text-center'), 
			Column::make('sent_date')->addClass('text-center')->exportable(0)->printable(0)->searchable(0)->width(125), 
			Column::computed('action')->addClass('text-center')->width(100), 
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Join_Program_' . date('YmdHis');
    }
}
