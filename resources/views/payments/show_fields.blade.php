<!-- Lease Id Field -->
<div class="col-sm-12">
    {!! Form::label('lease_id', 'Leased To:') !!}
    <p>{{ $leases[$payment->lease_id] ?? 'N/A' }}</p>
</div>


<!-- Payment Date Field -->
<div class="col-sm-12">
    {!! Form::label('payment_date', 'Payment Date:') !!}
    <p>{{ \Carbon\Carbon::parse($payment->payment_date)->format('d-m-y') }}</p>
</div>

<!-- Amount Paid Field -->
<div class="col-sm-12">
    {!! Form::label('amount_paid', 'Amount Paid:') !!}
    <p>Shs. {{ $payment->amount_paid }}</p>
</div>

<!-- Payment Method Field -->
<div class="col-sm-12">
    {!! Form::label('payment_method', 'Payment Method:') !!}
    <p>{{ $payment->payment_method }}</p>
</div>

<!-- Transaction Code Field -->
<div class="col-sm-12">
    {!! Form::label('transaction_code', 'Transaction Code:') !!}
    <p>{{ $payment->transaction_code }}</p>
</div>

<!-- Month Paid For Field -->
<div class="col-sm-12">
    {!! Form::label('month_paid_for', 'Month Paid For:') !!}
    <p>{{ $payment->month_paid_for }}</p>
</div>
<!-- Year Paid For Field -->
<div class="col-sm-12">
    {!! Form::label('year_paid_for', 'Year Paid For:') !!}
    <p>{{ $payment->year_paid_for }}</p>
</div>  

