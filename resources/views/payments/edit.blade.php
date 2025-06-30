@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1 class="display-6 text-primary font-weight-bold">
                        💳 Edit Payment
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('adminlte-templates::common.errors')

        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-gradient-primary text-white">
                <h5 class="mb-0">
                    <i class="fas fa-edit mr-2"></i> Update Payment Details
                </h5>
            </div>

            {!! Form::model($payment, ['route' => ['payments.update', $payment->id], 'method' => 'patch']) !!}
                <div class="card-body">
                    <div class="row">
                        @include('payments.fields')
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    {!! Form::submit('💾 Save Changes', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('payments.index') }}" class="btn btn-secondary">❌ Cancel</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <style>
        .bg-gradient-primary {
            background: linear-gradient(90deg, #007bff, #0056b3);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .card {
            font-family: 'Poppins', sans-serif;
        }

        .content-header h1 {
            font-family: 'Poppins', sans-serif;
        }
    </style>
@endsection
