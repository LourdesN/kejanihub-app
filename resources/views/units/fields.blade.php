<!-- House Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('house_id', 'House Id:') !!}
    {!! Form::number('house_id', null, ['class' => 'form-control', 'required']) !!}
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
    {!! Form::text('unit_status', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>