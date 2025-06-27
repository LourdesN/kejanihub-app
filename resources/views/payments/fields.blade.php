<!-- Lease Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lease_id', 'Lease Id:') !!}
    {!! Form::number('lease_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Payment Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_date', 'Payment Date:') !!}
    {!! Form::text('payment_date', null, ['class' => 'form-control','id'=>'payment_date']) !!}
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
    {!! Form::text('payment_method', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Transaction Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaction_code', 'Transaction Code:') !!}
    {!! Form::text('transaction_code', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Month Paid For Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('month_paid_for', 'Month Paid For:') !!}
    {!! Form::textarea('month_paid_for', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>