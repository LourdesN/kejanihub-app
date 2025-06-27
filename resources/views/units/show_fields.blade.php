<!-- House Id Field -->
<div class="col-sm-12">
    {!! Form::label('house_id', 'House Id:') !!}
    <p>{{ $unit->house_id }}</p>
</div>

<!-- Unit Number Field -->
<div class="col-sm-12">
    {!! Form::label('unit_number', 'Unit Number:') !!}
    <p>{{ $unit->unit_number }}</p>
</div>

<!-- Monthly Rent Field -->
<div class="col-sm-12">
    {!! Form::label('monthly_rent', 'Monthly Rent:') !!}
    <p>{{ $unit->monthly_rent }}</p>
</div>

<!-- Unit Status Field -->
<div class="col-sm-12">
    {!! Form::label('unit_status', 'Unit Status:') !!}
    <p>{{ $unit->unit_status }}</p>
</div>

