@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">M-Pesa Payments</h2>
    <p class="mb-4">Below is a list of all M-Pesa payments made through the system.</p>
    
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Transaction Code</th>
                <th>Phone Number</th>
                <th>Amount</th>
                <th>Account Reference</th>
                <th>Payment Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->transaction_code }}</td>
                    <td>{{ $payment->phone_number }}</td>
                    <td>Kshs {{ number_format($payment->amount, 2) }}</td>
                    <td>{{ $payment->account_reference }}</td>
                    <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No M-Pesa payments found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
