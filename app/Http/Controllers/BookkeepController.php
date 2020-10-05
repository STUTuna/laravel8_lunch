<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DepositLog;

class BookkeepController extends Controller
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        $total_deposit = $users->sum('deposit');
        return view('bookkeep', ['users' => $users,
                                        'total_deposit' => $total_deposit]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        foreach ($request->input('user_id') as $key => $user_id) {
            $user = User::find($user_id);
            $user->deposit = $user->deposit - intval($request->input('del')[$key]) + intval($request->input('add')[$key]);
            $user->save();

            if (isset($request->input('del')[$key]) && $request->input('del')[$key] > 0) {
                $depositLog = new DepositLog;
                $depositLog->user_id = $user_id;
                $depositLog->remark = $request->input('remark')[$key];

                $depositLog->money = intval($request->input('del')[$key]) * -1;
                $depositLog->operator_id = auth()->user()->id;
                $depositLog->save();
            }

            if (isset($request->input('add')[$key]) && $request->input('add')[$key] > 0) {
                $depositLog = new DepositLog;
                $depositLog->user_id = $user_id;
                $depositLog->remark = $request->input('remark')[$key];

                $depositLog->money = intval($request->input('add')[$key]);
                $depositLog->operator_id = auth()->user()->id;
                $depositLog->save();
            }

        }
        return redirect()->route('depositLog');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
