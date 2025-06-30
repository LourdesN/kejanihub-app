@extends('layouts.app')

@section('content')
    <style>
        .page-header {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 1.75rem;
            color: #333;
        }

        .btn-default {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0;
            color: #333;
            border: none;
            padding: 8px 16px;
            transition: all 0.3s ease;
        }

        .btn-default:hover {
            background-color: #dcdcdc;
            color: #000;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
            font-family: 'Poppins', sans-serif;
        }

        .card-body {
            padding: 30px;
        }

        .content {
            font-family: 'Poppins', sans-serif;
        }

        .content-header {
            margin-bottom: 20px;
        }
    </style>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-6">
                    <h1 class="page-header">🏘️ Unit Details</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a class="btn btn-default" href="{{ route('units.index') }}">
                        <i class="fas fa-arrow-left mr-1"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('units.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
