<?php

namespace App\DataTables;

use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;

use Yajra\DataTables\Services\DataTable;

class PharmaciesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $pharmacy = Pharmacy::withTrashed();
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($pharmacys) use ($pharmacy) {
                return view('pharmacy.action', ['pharmacies' => $pharmacys, 'id' => $pharmacys->id, 'pharmacy' => $pharmacy]);
            })->addColumn(
                'area',
                function ($userAddress) {
                    return
                        $userAddress->area->name;
                }
            )

            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Pharmacy $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pharmacies-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
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
            Column::make('id'),
            Column::make('name'),
            Column::make('area'),
            Column::make('email'),
            Column::make('national_id'),


            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(260)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Pharmacies_' . date('YmdHis');
    }
}
