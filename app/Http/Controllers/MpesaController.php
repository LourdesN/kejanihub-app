<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Lease;
use App\Models\Payment;
use App\Models\MpesaPayment;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MpesaController extends Controller
{
     private function getAccessToken()
    {
        $consumerKey = env('MPESA_CONSUMER_KEY');
        $consumerSecret = env('MPESA_CONSUMER_SECRET');

       $response = Http::withBasicAuth($consumerKey, $consumerSecret)
    ->withoutVerifying() // 👈 this line disables SSL cert check
    ->get('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
    
        return $response['access_token'];
    }
    

     public function registerC2BUrls()
    {
        $accessToken = $this->getAccessToken();

        $response = Http::withToken($accessToken)
        ->withoutVerifying() 
        ->post('https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl', [
            'ShortCode' => '600000',
            'ResponseType' => 'Completed',
            'ConfirmationURL' => 'https://36dcc94435c6.ngrok-free.app/api/callback',
            'ValidationURL' => 'https://36dcc94435c6.ngrok-free.app/api/validate',
        ]);

        return $response->json();
    }

   
    public function handleC2BCallback(Request $request)
    {
        $data = $request->all();

        // Save raw data and log transaction
        $payment = MpesaPayment::create([
            'transaction_code' => $data['TransID'] ?? uniqid(),
            'phone_number' => $data['MSISDN'] ?? 'unknown',
            'amount' => $data['TransAmount'] ?? 0,
            'account_reference' => 'Rent',
            'payment_date' => now(),
            'raw_data' => json_encode($data),
        ]);

        // Optionally link to tenant by phone or BillRefNumber
        $tenant = Tenant::where('phone_number', $payment->phone_number)->first();

        if ($tenant) {
            $lease = $tenant->lease; // assuming Tenant hasOne Lease

            Payment::create([
                'tenant_id' => $tenant->id,
                'lease_id' => $lease?->id,
                'amount_paid' => $payment->amount,
                'payment_date' => now(),
                'month_paid_for' => now()->format('F'),
                'year_paid_for' => now()->year,
                'transaction_code' => $payment->transaction_code,
            ]);
        }

        return response()->json(['ResultCode' => 0, 'ResultDesc' => 'Accepted']);
    }

    public function validateTransaction(Request $request)
{
    Log::info('Validation Request:', $request->all());

    return response()->json([
        'ResultCode' => 0,
        'ResultDesc' => 'Accepted'
    ]);
}

public function confirmTransaction(Request $request)
{
    Log::info('Confirmation Request:', $request->all());

    // You can store the payment here in DB if needed

    return response()->json([
        'ResultCode' => 0,
        'ResultDesc' => 'Confirmation Received Successfully'
    ]);
}

public function viewPayments()
{
    $payments = MpesaPayment::orderBy('payment_date', 'desc')->get();
    return view('mpesa.payments', compact('payments'));
}

}
