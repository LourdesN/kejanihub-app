@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1 class="display-6 text-primary font-weight-bold">
                        📝 Create a New Lease
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-gradient-info text-white">
                <h5 class="mb-0">
                    <i class="fas fa-file-signature mr-2"></i> Lease Details
                </h5>
            </div>

            {!! Form::open(['route' => 'leases.store']) !!}
                <div class="card-body">
                    <div class="row">
                        @include('leases.fields')
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    {!! Form::submit('📄 Save Lease', ['class' => 'btn btn-info']) !!}
                    <a href="{{ route('leases.index') }}" class="btn btn-secondary">❌ Cancel</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <style>
        .bg-gradient-info {
            background: linear-gradient(90deg, #17a2b8, #138496);
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
        }

        .btn-info:hover {
            background-color: #138496;
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
