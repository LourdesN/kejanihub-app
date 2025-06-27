<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location', 'Location:') !!}
    {!! Form::text('location', null, ['class' => 'form-control', 'required', 'maxlength' => 150, 'maxlength' => 150]) !!}
</div>

<!-- Number Of Units Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number_of_units', 'Number Of Units:') !!}
    {!! Form::number('number_of_units', null, ['class' => 'form-control', 'required']) !!}
</div>