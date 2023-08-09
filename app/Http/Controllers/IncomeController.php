<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    function IncomePage() {
        return view('pages.dashboard.income-page');
    }
    
    function IncomeCreate (Request $request) {
        $user_id=$request->header('id');
        return Income::create([
            'amount' =>$request->input('amount'),
            'description' =>$request->input('description'),
            'date' =>$request->input('date'),
            'category' =>$request->input('category'),
            'user_id' => $user_id
        ]);
    }

    function IncomeDelete (Request $request) {
        $income_id = $request->input('id');
        $user_id=$request->header('id');
        return Income::where('id', $income_id)
        ->where('user_id', $user_id)
        ->delete();
    }

    function IncomeList (Request $request) {
        $user_id=$request->header('id');
        return Income::where('user_id',$user_id)->get();
    }

    function IncomeUpdate (Request $request) {
        $income_id = $request->input('id');
        $user_id = $request->header('id');
        return Income::where('id', $income_id)
        ->where('user_id', $user_id)
        ->update([
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'category' => $request->input('category'),
        ]);
    }

    function IncomeById (Request $request) {
        $income_id = $request->input('id');
        $user_id=$request->header('id');
        return Income::where('id', $income_id)
        ->where('user_id', $user_id)
        ->first();
    }
}
