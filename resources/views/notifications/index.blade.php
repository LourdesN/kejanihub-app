@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="mb-4 font-weight-bold text-primary">🔔 Your Notifications</h3>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            @if($notifications->count())
                <ul class="list-group list-group-flush">
                    @foreach($notifications as $notification)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-info-circle text-info mr-2"></i>
                                {{ $notification->data['message'] ?? 'Notification' }}
                            </div>
                            <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="text-center py-4">
                    <i class="fas fa-bell-slash fa-2x text-muted"></i>
                    <p class="mt-2 text-muted">You have no notifications.</p>
                </div>
            @endif
        </div>
    </div>
</div>
<style>
    .list-group-item {
        transition: background-color 0.2s;
    }

    .list-group-item:hover {
        background-color: #f1f1f1;
    }

    .text-primary {
        color: #007bff !important;
    }

    .card {
        border-radius: 10px;
        border: none;
    }

    .card-body {
        border-radius: 10px;
    }
</style>
@endsection
