@extends('layouts.app')

@section('content')
    <style>
        .page-header {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 1.75rem;
            color: #333;
        }

        .btn-primary {
            background: linear-gradient(135deg, #6c63ff, #574fd6);
            border: none;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #574fd6, #4a45c2);
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
        }

        .content {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-6">
                    <h1 class="page-header">💰 Payments</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a class="btn btn-primary" href="{{ route('payments.create') }}">
                        <i class="fas fa-plus-circle mr-1"></i> Add New
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('flash::message')

        <div class="clearfix mb-3"></div>

        <div class="card">
            <div class="card-body p-3">
                @include('payments.table')
            </div>
        </div>
    </div>
@endsection
