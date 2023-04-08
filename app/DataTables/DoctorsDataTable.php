<?php

namespace App\DataTables;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DoctorsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($doctor) {
                return view('doctors.action', ['id' => $doctor->id, 'banned_at' => $doctor->banned_at]);
            })->addColumn('pharmacy', function ($user) {
                if (!isset($user->pharmacy)) {
                    return "Made By Admin";
                }
                return $user->pharmacy->name;
            })->editColumn('created_at', function ($data) {
                $formatedDate = Carbon::parse($data->created_at)->format('Y-m-d');
                return $formatedDate;
            })->editColumn('banned_at', function ($user) {
                if ($user->banned_at) {
                    return '<span class="text-danger fw-bold">Banned</span>';
                } else {
                    return '<span class="text-success fw-bold">Not Banned</span>';
                }
            })->escapeColumns('banned_at')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Doctor $model): QueryBuilder
    {
        $user = Auth::user();

        $model = $model->newQuery()->with('pharmacy');

        if (!$user->hasRole('admin')) {
            $model->where('pharmacy_id', $user->typeable_id);
        }
        return $model->orderBy('id');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('doctors-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */

    public function getColumns(): array
    {
        return [
            Column::make('id')->title('ID')->orderable(true),
            Column::make('name')->title('Name'),
            Column::make('email')->title('Email'),
            Column::make('national_id')->title('National ID'),
            Column::make('created_at')->title('Created At'),
            Column::make('pharmacy')->title('Pharmacy')->visible(Auth::user()->hasRole('admin'))->width(100),
            Column::make('banned_at')->title('Status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center')
                ->escape(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Doctors_' . date('YmdHis');
    }
}
