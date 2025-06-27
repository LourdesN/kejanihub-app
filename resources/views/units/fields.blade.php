<!-- House Field -->
<div class="form-group col-sm-6">
    {!! Form::label('house_id', 'House:') !!}
    {!! Form::select('house_id', $houses, null, ['class' => 'form-control', 'placeholder' => 'Select House', 'required']) !!}
</div>


<!-- Unit Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unit_number', 'Unit Number:') !!}
    {!! Form::text('unit_number', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Monthly Rent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monthly_rent', 'Monthly Rent:') !!}
    {!! Form::number('monthly_rent', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Unit Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unit_status', 'Unit Status:') !!}
    {!! Form::select('unit_status', ['Vacant' => 'Vacant', 'Occupied' => 'Occupied'], null, ['class' => 'form-control', 'required', 'placeholder' => 'Select Status']) !!}
</div>
