<?php

namespace App\DataTables;

use App\Models\Payment;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PaymentDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
         ->editColumn('payment_date', function ($payment) {
            return Carbon::parse($payment->payment_date)->format('d-m-Y');
        })
         ->editColumn('amount_paid', function ($payment) {
            return 'Kshs ' . number_format($payment->amount_paid, 2);
        })
       ->editColumn('lease_id', function ($payment) {
    $tenant = optional(optional($payment->lease)->tenant);
    $unit = optional(optional($payment->lease)->unit);

    return $tenant->first_name . ' ' . $tenant->last_name . ' - Unit ' . $unit->unit_number;
})

        ->addColumn('action', 'payments.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Payment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Payment $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    // Enable Buttons as per your need
//                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            
            'lease_id' => ['title' => 'Leased To'],
            'payment_date',
            'amount_paid',
            'payment_method',
            'transaction_code',
            'month_paid_for',
            'year_paid_for' => ['title' => 'Year Paid For'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'payments_datatable_' . time();
    }
}
