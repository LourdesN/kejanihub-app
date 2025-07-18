@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center text-primary">🕵️‍♂️ System Audit Logs</h2>
    
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th>User</th>
                            <th>Event</th>
                            <th>Model</th>
                            <th>Old Values</th>
                            <th>New Values</th>
                            <th>IP Address</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($audits as $audit)
                            <tr>
                                <td>{{ optional($audit->user)->name ?? 'System' }}</td>
                                <td><span class="badge bg-info text-dark">{{ ucfirst($audit->event) }}</span></td>
                                <td>{{ class_basename($audit->auditable_type) }}</td>
                                <td>
                                    <pre class="bg-light p-2 rounded">{{ json_encode($audit->old_values, JSON_PRETTY_PRINT) }}</pre>
                                </td>
                                <td>
                                    <pre class="bg-light p-2 rounded">{{ json_encode($audit->new_values, JSON_PRETTY_PRINT) }}</pre>
                                </td>
                                <td>{{ $audit->ip_address }}</td>
                                <td>{{ $audit->created_at->format('d M Y, H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">No audit logs available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-center">
            {{ $audits->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
