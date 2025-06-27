<!-- Tenant Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tenant_id', 'Tenant Id:') !!}
    {!! Form::number('tenant_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Unit Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unit_id', 'Unit Id:') !!}
    {!! Form::number('unit_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Start Date:') !!}
    {!! Form::text('start_date', null, ['class' => 'form-control','id'=>'start_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#start_date').datepicker()
    </script>
@endpush

<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'End Date:') !!}
    {!! Form::text('end_date', null, ['class' => 'form-control','id'=>'end_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#end_date').datepicker()
    </script>
@endpush

<!-- Deposit Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deposit_amount', 'Deposit Amount:') !!}
    {!! Form::number('deposit_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Lease Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lease_status', 'Lease Status:') !!}
    {!! Form::text('lease_status', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>