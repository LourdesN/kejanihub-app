<!-- Tenant Id Field -->
<div class="col-sm-12">
    {!! Form::label('tenant_id', 'Tenant Id:') !!}
    <p>{{ $lease->tenant_id }}</p>
</div>

<!-- Unit Id Field -->
<div class="col-sm-12">
    {!! Form::label('unit_id', 'Unit Id:') !!}
    <p>{{ $lease->unit_id }}</p>
</div>

<!-- Start Date Field -->
<div class="col-sm-12">
    {!! Form::label('start_date', 'Start Date:') !!}
    <p>{{ $lease->start_date }}</p>
</div>

<!-- End Date Field -->
<div class="col-sm-12">
    {!! Form::label('end_date', 'End Date:') !!}
    <p>{{ $lease->end_date }}</p>
</div>

<!-- Deposit Amount Field -->
<div class="col-sm-12">
    {!! Form::label('deposit_amount', 'Deposit Amount:') !!}
    <p>{{ $lease->deposit_amount }}</p>
</div>

<!-- Lease Status Field -->
<div class="col-sm-12">
    {!! Form::label('lease_status', 'Lease Status:') !!}
    <p>{{ $lease->lease_status }}</p>
</div>

