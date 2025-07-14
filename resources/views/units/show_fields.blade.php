<!-- House Id Field -->
<div class="col-sm-12">
    {!! Form::label('house_id', 'House:') !!}
    <p>{{ $unit->house->name }}</p>
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
    <p>
        @if ($unit->unit_status === 'Vacant')
            <span class="badge badge-success">Vacant</span>
        @elseif ($unit->unit_status === 'Occupied')
            <span class="badge badge-danger">Occupied</span>
        @else
            <span class="badge badge-secondary">{{ $unit->unit_status }}</span>
        @endif
    </p>
</div>


