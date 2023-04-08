<?php

namespace App\DataTables;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


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
            ->addColumn('doctor_id', function (Order $order) {
                return $order->doctor ? $order->doctor->name : '';
            })
            ->addColumn('User', function (Order $order) {
                return $order->client->name;
            })
            ->addColumn('is_insured', function (Order $order) {
                return $order->is_insured ? 'Yes' : 'No';
            })
            ->addColumn('creator_type', function (Order $order) {
                $user = auth()->user();
                $isAdmin = $user->hasRole('admin');
                $isClient = $user->hasRole('client');
                $isDoct = $user->hasRole('doctor');
                $isPharm = $user->hasRole('pharmacy');
                if (!$user) {
                    return '-';
                } else if ($isAdmin && $order->user && $order->user->getRoleNames()->isNotEmpty()) {

                    return $order->user->getRoleNames()->first();
                } else if ($isClient && $order->user && $order->user->getRoleNames()->isNotEmpty()) {
                    return $order->user->getRoleNames()->first();
                } else if ($isDoct && $order->user && $order->user->getRoleNames()->isNotEmpty()) {
                    return $order->user->getRoleNames()->first();
                } else if ($isPharm && $order->user && $order->user->getRoleNames()->isNotEmpty()) {
                    return $order->user->getRoleNames()->first();
                }
            })
            ->addColumn('assigned_pharmacy', function (Order $order) {
                $user = auth()->user();
                if (!$user) return '-';
                $isAdmin = $user->hasRole('admin');
                if ($isAdmin && $order->pharmacy) {
                    return $order->pharmacy ? $order->pharmacy->name : '';
                }
                return '-';
            })
            ->addColumn('Creation Date', function (Order $order) {
                return $order->created_at->diffForHumans();
            })
            ->addColumn('Delivering Address', function (Order $order) {
                if ($order->pharmacy) {
                    return $order->pharmacy->area->address;
                }
                return '-';
            })
            ->setRowId('id');
    }
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
        return   [
            Column::make('id')->addClass('text-center'),
            Column::make('status')->addClass('text-center'),
            Column::make('is_insured')->addClass('text-center'),
            Column::computed('User', 'Client Name')->addClass('text-center'),
            Column::make('doctor_id')->addClass('text-center')->title('doctor Name'),
            Column::make('Creation Date')->addClass('text-center'),
            Column::make('Delivering Address')->addClass('text-center'),
            Column::computed('assigned_pharmacy', 'Assigned Pharmacy')->addClass('text-center'),
            Column::computed('creator_type', 'Creator Type')->addClass('text-center'),
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
