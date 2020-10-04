<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepositLog;

class DepositLogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depositLogs = DepositLog::orderBy('created_at', 'desc')->get();

        return view('deposit_log', ['depositLogs' => $depositLogs]);
    }
}
