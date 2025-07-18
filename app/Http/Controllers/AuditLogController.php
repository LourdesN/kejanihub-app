<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;

class AuditLogController extends Controller
{
    public function index()
    {
        $audits = Audit::with('user')->latest()->paginate(20);
        return view('audits.index', compact('audits'));
    }
}

