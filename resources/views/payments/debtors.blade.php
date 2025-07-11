@extends('layouts.app')

@section('content')
    <section class="content-header">
  <div class="container-fluid">
    <div>
    <h3 class="mb-4 text-left">🧾 Debtors</h3>
     <a href="{{ route('debtors.pdf') }}" class="btn btn-danger mb-3">
      <i class="fas fa-file-pdf"></i> Download PDF
     </a>
    </div>
    @if ($debtors->isEmpty())
        <div class="alert alert-success text-center">
            All tenants have cleared their rent this month ✅
        </div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="bg-gradient-danger">
                <tr>
                    <th>Tenant</th>
                    <th>Unit</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Monthly Rent</th>
                    <th>Amount Paid</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($debtors as $debtor)
                    <tr>
                        <td>{{ $debtor['tenant_name'] }}</td>
                        <td>{{ $debtor['unit_number'] }}</td>
                         <td>{{ $debtor['month'] }}</td>
                        <td>{{ $debtor['year'] }}</td>
                        <td>Ksh {{ number_format($debtor['monthly_rent']) }}</td>
                        <td>Ksh {{ number_format($debtor['amount_paid']) }}</td>
                       <td class="{{ $debtor['balance'] >= 5000 ? 'bg-danger text-white font-weight-bold' : 'text-danger' }}">
    <strong>Ksh {{ number_format($debtor['balance']) }}</strong>
</td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="text-center mt-4">
            {{ $paginatedDebtors->links() }}
        </div>

    @endif
</div>
        <div class="text-center mt-4">
            <a href="{{ route('payments.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Payments
            </a>
        </div>
    </div>  
    <style>
        .bg-gradient-danger {
            background: linear-gradient(90deg, #dc3545, #c82333);
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .content-header h1 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            color: #dc3545;
        }
        .card-header {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }
        .card-body {
            font-family: 'Poppins', sans-serif;
        }
        table th, table td {
            text-align: center;
        }
        table th {
            background-color: #f8d7da;
            color: #721c24;
        }
        table td {
            background-color: #f5c6cb;
            color: #721c24;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f1b0b7;
        }
        .table-striped tbody tr:nth-of-type(even) {
            background-color: #f8d7da;
        }
        .table-striped tbody tr:hover {
            background-color: #f5c6cb;
        }
        .fas {
            margin-right: 0.5rem;
        }
        .btn {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .text-danger {
            color: #dc3545 !important;
        }
        .text-center {
            text-align: center;
        }
        .mt-4 {
            margin-top: 1.5rem !important;
        }
        .mb-0 {
            margin-bottom: 0 !important;
        }

        .mb-2 {
            margin-bottom: 0.5rem !important;
        }
        .mb-3 {
            margin-bottom: 1rem !important;
        }
        .mb-4 {
            margin-bottom: 1.5rem !important;
        }
        .shadow-sm {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .border-0 {
            border: none !important;
        }
        .rounded-lg {
            border-radius: 0.5rem !important;
        }
        .text-white {
            color: #fff !important;
        }
        .text-primary {
            color: #007bff !important;
        }
        .text-secondary {
            color: #6c757d !important;
        }
        .text-success {
            color: #28a745 !important;
        }
        .text-warning {
            color: #ffc107 !important;
        }
        .text-info {
            color: #17a2b8 !important;
        }
        .text-dark {
            color: #343a40 !important;
        }
        .text-light {
            color: #f8f9fa !important;
        }
        .text-muted {
            color: #6c757d !important;
        }
        .text-black {
            color: #000 !important;
        }
        .text-white {
            color: #fff !important;
        }
        .text-danger {
            color: #dc3545 !important;
        }
        .text-success {
            color: #28a745 !important;
        }
        .text-warning {
            color: #ffc107 !important;
        }
        .text-info {
            color: #17a2b8 !important;
        }
        .text-primary {
            color: #007bff !important;
        }

        .text-secondary {
            color: #6c757d !important;
        }

        </style>
@endsection