@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1 class="display-6 font-weight-bold text-primary">🏢 Add a New Unit</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('adminlte-templates::common.errors')

        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-gradient-primary text-white">
                <h5 class="mb-0"><i class="fas fa-building mr-2"></i> Unit Details</h5>
            </div>

            {!! Form::open(['route' => 'units.store']) !!}
                <div class="card-body">
                    <div class="row">
                        @include('units.fields')
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    {!! Form::submit('💾 Save Unit', ['class' => 'btn btn-success']) !!}
                    <a href="{{ route('units.index') }}" class="btn btn-secondary">❌ Cancel</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <style>
        .card-header.bg-gradient-primary {
            background: linear-gradient(90deg, #007bff, #00c6ff);
        }
        .btn-success {
            background-color: #28a745;
            border: none;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .content-header h1 {
            font-family: 'Poppins', sans-serif;
        }
    </style>
@endsection
