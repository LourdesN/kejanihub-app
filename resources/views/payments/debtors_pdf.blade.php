<!DOCTYPE html>
<html>
<head>
    <title>Debtors Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #f44336; color: white; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Debtors Report - {{ now()->format('F Y') }}</h2>

    <table>
        <thead>
            <tr>
                <th>Tenant</th>
                <th>Unit</th>
                <th>Month</th>
                <th>Year</th>
                <th>Monthly Rent</th>
                <th>Amount Paid</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            @foreach($debtors as $debtor)
            <tr>
                <td>{{ $debtor['tenant_name'] }}</td>
                <td>{{ $debtor['unit_number'] }}</td>
                <td>{{ $debtor['month'] }}</td>
                <td>{{ $debtor['year'] }}</td>
                <td>Ksh {{ number_format($debtor['monthly_rent']) }}</td>
                <td>Ksh {{ number_format($debtor['amount_paid']) }}</td>
                <td><strong>Ksh {{ number_format($debtor['balance']) }}</strong></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
