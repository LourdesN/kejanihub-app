@extends('layouts.app')

@section('content')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: radial-gradient(circle, rgba(238, 174, 202, 0.3), rgba(148, 187, 233, 0.3));
        }

        h1 {
            font-weight: 600;
            color: #333;
        }

        .btn-primary {
            background-color: #6c63ff;
            border-color: #6c63ff;
            font-weight: 500;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #574fd6;
            border-color: #574fd6;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            border: none;
        }

        .card .card-header {
            background-color: transparent;
            border-bottom: none;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .float-right {
            margin-top: 10px;
        }

        .content-header {
            padding-bottom: 0;
        }

        .flash-message {
            font-size: 0.95rem;
            font-weight: 500;
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 1rem;
        }
        table.dataTable {
        font-size: 0.9rem;
        border-radius: 10px;
        }
    
    </style>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-6">
                    <h1>🏠 Houses</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a class="btn btn-primary" href="{{ route('houses.create') }}">
                        <i class="fas fa-plus-circle mr-1"></i> Add New
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('flash::message')

        <div class="card">
            @include('houses.table')
        </div>
    </div>
@endsection
