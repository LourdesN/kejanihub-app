<!-- Tenant Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tenant_id', 'Tenant:') !!}
    {!! Form::select('tenant_id', $tenants, null, ['class' => 'form-control', 'placeholder' => 'Select Tenant',  'required']) !!}
</div>

<!-- Unit Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unit_id', 'Unit:') !!}
    {!! Form::select('unit_id', $units, null, ['class' => 'form-control', 'placeholder' => 'Select Unit',  'required']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Start Date:') !!}
    {!! Form::date('start_date', null, ['class' => 'form-control','id'=>'start_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#start_date').datepicker()
    </script>
@endpush

<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'End Date:') !!}
    {!! Form::date('end_date', null, ['class' => 'form-control','id'=>'end_date']) !!}
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
    {!! Form::select('lease_status', [
        'active' => 'Active',
        'pending' => 'Pending',
        'terminated' => 'Terminated',
        'expired' => 'Expired'
    ], null, ['class' => 'form-control', 'placeholder' => 'Select Lease Status']) !!}
</div>
