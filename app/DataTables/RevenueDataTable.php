<?php

namespace App\DataTables;

use App\Models\Pharmacy;
use App\Models\Revenue;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RevenueDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($id) {
                return view(
                    'revenue.action',
                    ['id' => $id]
                );
            })
            ->addColumn(
                'total_orders',
                function ($pharmacy) {
                    return $pharmacy->orders()->count();
                }
            )
            ->addColumn(
                'total_revenue',
                function ($pharmacy) {
                    return $pharmacy->orders->sum('total_price');
                }
            )
            ->addColumn('avatar', function ($pharmacy) {
                return '<img src="' . asset($pharmacy->avatar) . '" width="50">';
            })
            ->rawColumns(['avatar'])
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
                    ->setTableId('revenue-table')
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
            Column::make('id')->hidden(),
            Column::make('avatar')->title('PharmacyAvatar'),
            Column::make('name')->title('PharmacyName'),
            Column::make('total_orders')->title('TotalOrders'),
            Column::make('total_revenue')->title('TotalRevenue'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(80)
                  ->addClass('text-center'),
            
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Revenue_' . date('YmdHis');
    }
}
