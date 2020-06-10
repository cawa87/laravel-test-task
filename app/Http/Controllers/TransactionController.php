<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('api.role');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request)
    {
        //var_dump(auth()->user()); die();
        return response()->json(auth()->user()->balance->transactions);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function transfer(Request $request)
    {

        var_dump(auth()->user()->balance->currentBalance()); die();
        return response()->json(auth()->user()->balance->transactions);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function batchTransfer(Request $request)
    {
        return response()->json(auth()->user()->balance->transactions);
    }
}
