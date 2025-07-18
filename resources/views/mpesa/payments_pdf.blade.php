<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>M-Pesa Payments Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
            margin: 40px;
            color: #333;
            background-color: #fff;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        p {
            text-align: center;
            font-size: 12px;
            color: #666;
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        thead {
            background-color: #2c3e50;
            color: #fff;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px 10px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        th {
            font-weight: bold;
            text-transform: uppercase;
            font-size: 12px;
        }

        td {
            font-size: 12px;
        }
    </style>
</head>
<body>
    <h2>M-Pesa Payments Report</h2>
    <p>Generated on {{ now()->format('d M Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Transaction Code</th>
                <th>Phone Number</th>
                <th>Amount</th>
                <th>Account Reference</th>
                <th>Payment Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->transaction_code }}</td>
                    <td>{{ $payment->phone_number }}</td>
                    <td>Kshs {{ number_format($payment->amount, 2) }}</td>
                    <td>{{ $payment->account_reference }}</td>
                    <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
