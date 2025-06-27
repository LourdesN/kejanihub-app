<!-- Lease Id Field -->
<div class="col-sm-12">
    {!! Form::label('lease_id', 'Lease Id:') !!}
    <p>{{ $payment->lease_id }}</p>
</div>

<!-- Payment Date Field -->
<div class="col-sm-12">
    {!! Form::label('payment_date', 'Payment Date:') !!}
    <p>{{ $payment->payment_date }}</p>
</div>

<!-- Amount Paid Field -->
<div class="col-sm-12">
    {!! Form::label('amount_paid', 'Amount Paid:') !!}
    <p>{{ $payment->amount_paid }}</p>
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

