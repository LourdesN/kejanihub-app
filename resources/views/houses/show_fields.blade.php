<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $house->name }}</p>
</div>

<!-- Location Field -->
<div class="col-sm-12">
    {!! Form::label('location', 'Location:') !!}
    <p>{{ $house->location }}</p>
</div>

<!-- Number Of Units Field -->
<div class="col-sm-12">
    {!! Form::label('number_of_units', 'Number Of Units:') !!}
    <p>{{ $house->number_of_units }}</p>
</div>

