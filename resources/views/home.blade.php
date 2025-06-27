@extends('layouts.app')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: radial-gradient(circle, rgba(238, 174, 202, 0.1), rgba(148, 187, 233, 0.1));
        }

        .dashboard-title {
            font-weight: 600;
            color: #333;
        }

        .card-summary {
            position: relative;
            border-radius: 12px;
            background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            color: #333;
            transition: 0.3s;
            height: 100%;
            text-decoration: none;
        }

        .card-summary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .card-summary h3 {
            font-weight: 600;
            font-size: 1.8rem;
            z-index: 2;
        }

        .card-summary p {
            font-size: 1rem;
            z-index: 2;
        }

        .card-icon-bg {
            position: absolute;
            right: 15px;
            bottom: 10px;
            font-size: 4.5rem;
            color: rgba(0, 0, 0, 0.08);
            z-index: 1;
        }

        .chart-container {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-height: 450px;
            max-width: 500px;
        }

        #occupancyChart {
            max-height: 300px;
        }

        a.card-summary {
            color: inherit;
        }
    </style>

    <div class="container-fluid mt-4">
        <h2 class="dashboard-title text-center mb-4">🏠 Welcome to Kejani Hub, {{ Auth::user()->name }}!</h2>

        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <a href="{{ route('units.index') }}" class="card-summary d-block">
                    <h3>{{ $unitsCount }}</h3>
                    <p>Manage Units</p>
                    <i class="fas fa-building card-icon-bg"></i>
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{ route('payments.index') }}" class="card-summary d-block">
                    <h3>Ksh {{ number_format($totalPayments) }}</h3>
                    <p>Total Payments</p>
                    <i class="fas fa-money-bill-wave card-icon-bg"></i>
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{ route('houses.index') }}" class="card-summary d-block">
                    <h3>{{ $housesCount }}</h3>
                    <p>Manage Houses</p>
                    <i class="fas fa-home card-icon-bg"></i>
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{ route('tenants.index') }}" class="card-summary d-block">
                    <h3>{{ $tenantsCount }}</h3>
                    <p>Manage Tenants</p>
                    <i class="fas fa-user-friends card-icon-bg"></i>
                </a>
            </div>
        </div>

        <div class="row">
    <div class="col-md-6 mb-4">
        <div class="chart-container">
            <h5 class="text-center">Vacant vs Occupied Units</h5>
            <canvas id="occupancyChart"></canvas>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="chart-container">
            <h5 class="text-center">Monthly Payments Summary</h5>
            <canvas id="monthlyPaymentsChart"></canvas>
        </div>
    </div>
</div>

</div>

    <script>
        const ctx = document.getElementById('occupancyChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Occupied', 'Vacant'],
                datasets: [{
                    data: [{{ $occupiedCount }}, {{ $vacantCount }}],
                    backgroundColor: ['#36A2EB', '#FF6384'],
                    borderColor: ['#36A2EB', '#FF6384'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });
    </script>

<script>
    const monthlyCtx = document.getElementById('monthlyPaymentsChart').getContext('2d');

    new Chart(monthlyCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($months) !!},
            datasets: [{
                label: 'Payments (Ksh)',
                data: {!! json_encode($paymentsPerMonth) !!},
                backgroundColor: 'rgba(75, 192, 192, 0.7)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Ksh ' + value.toLocaleString();
                        }
                    }
                }
            }
        }
    });
</script>

@endsection
