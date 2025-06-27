<!-- Tenant Field -->
<div class="col-sm-12">
    {!! Form::label('tenant_id', 'Tenant:') !!}
    <p>{{ $lease->tenant->first_name . ' ' . $lease->tenant->last_name }}</p>
</div>


<!-- Unit Id Field -->
<div class="col-sm-12">
    {!! Form::label('unit_id', 'Unit Id:') !!}
    <p>{{ $lease->unit->unit_number }}</p>
</div>

<!-- Start Date Field -->
<div class="col-sm-12">
    {!! Form::label('start_date', 'Start Date:') !!}
    <p>{{ \Carbon\Carbon::parse($lease->start_date)->format('d-m-Y') }}</p>
</div>

<!-- End Date Field -->
<div class="col-sm-12">
    {!! Form::label('end_date', 'End Date:') !!}
    <p>{{ \Carbon\Carbon::parse($lease->end_date)->format('d-m-Y') }}</p>
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

