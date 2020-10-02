<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepositLog;

class DepositLogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $depositLogs = DepositLog::with('operator')->get();
        // $operators = DepositLog::with('operator')->get();

        // return view('deposit_log', ['depositLogs' => $depositLogs, 'operators' => $operators]);
        return view('deposit_log', ['depositLogs' => $depositLogs]);
    }
}
