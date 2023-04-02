<?php

namespace App\DataTables;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrdersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'orders.action')
            ->addColumn('doctor_id', function(Order $order){
                return $order->doctor->name;
            })
            ->addColumn('User', function(Order $order){
                return $order->user->name;
            })
            ->setRowId('id');
    }

    /*
            ->addColumn('User', function(Order $order){
                return $order->client->name;
            })
            
            ->addColumn('creatorType', function(Order $order){
                return $order->user->getRoleNames()[0];
            })
            ->addColumn('Pharmacy', function(Order $order){
                return $order->pharmacy->name;
            })
     
    */
    /**
     * Get the query source of dataTable.
     */
    public function query(Order $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('order-table')
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
             Column::make('id')->addClass('text-center'),
                Column::make('status')->addClass('text-center'),
                //Column::make('is_insured')->addClass('text-center'),
                Column::computed('User' , 'Client Name')->addClass('text-center'),
                //Column::computed('Pharmacy' , 'Assigned Pharmacy')->addClass('text-center'),
                //Column::computed('creatorType' , 'Creator Type')->addClass('text-center'),
                // Column::computed('Address' , 'User Address')->addClass('text-center'),
                Column::make('doctor_id')->addClass('text-center'),
                Column::computed('action')
                      ->exportable(false)
                      ->printable(false)
                      ->width(70)
                      ->addClass('text-center') 
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Order_' . date('YmdHis');
    }
}
