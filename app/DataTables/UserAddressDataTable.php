<?php

namespace App\DataTables;

use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserAddressDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($userAddress) {
                return view(
                    'user-address.action',
                    ['userAddress' => $userAddress]
                );
            })
            ->addColumn(
                'user_name',
                function ($userAddress) {
                    return
                        $userAddress->user->name;
                }
            )
            ->addColumn(
                'area_name',
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
    public function query(UserAddress $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('useraddress-table')
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

            Column::make('street'),
            Column::make('building_number'),
            Column::make('floor_num'),
            Column::make('apartment_num'),
            Column::make('is_primary_address'),
            Column::make('user_name'),
            Column::make('area_name'),
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
        return 'UserAddress_' . date('YmdHis');
    }
}
