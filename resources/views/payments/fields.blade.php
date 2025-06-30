<!-- Lease Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lease_id', 'Leased To:') !!}
    {!! Form::select('lease_id', $leases, null, ['class' => 'form-control', 'placeholder' => 'Select Tenant with unit', 'required']) !!}
</div>

<!-- Payment Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_date', 'Payment Date:') !!}
    {!! Form::date('payment_date', null, ['class' => 'form-control','id'=>'payment_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#payment_date').datepicker()
    </script>
@endpush

<!-- Amount Paid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount_paid', 'Amount Paid:') !!}
    {!! Form::number('amount_paid', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Payment Method Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_method', 'Payment Method:') !!}
    {!! Form::select('payment_method', [
        'Cash' => 'Cash',
        'Mpesa' => 'Mpesa',
        'Bank Transfer' => 'Bank Transfer'
    ], null, ['class' => 'form-control', 'placeholder' => 'Select Payment Method',  'required']) !!}
</div>


<!-- Transaction Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaction_code', 'Transaction Code:') !!}
    {!! Form::text('transaction_code', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Month Paid For Field -->
<div class="form-group col-sm-6">
    {!! Form::label('month_paid_for', 'Month Paid For:') !!}
    {!! Form::select('month_paid_for', [
        'January' => 'January',
        'February' => 'February',
        'March' => 'March',
        'April' => 'April',
        'May' => 'May',
        'June' => 'June',
        'July' => 'July',
        'August' => 'August',
        'September' => 'September',
        'October' => 'October',
        'November' => 'November',
        'December' => 'December'
    ], null, ['class' => 'form-control', 'placeholder' => 'Select Month', 'required']) !!}
</div>
