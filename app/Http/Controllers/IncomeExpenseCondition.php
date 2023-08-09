<?php

namespace App\Http\Controllers;

use App\Models\Income;

use App\Models\Expense;
use Illuminate\Http\Request;

class IncomeExpenseCondition extends Controller
{
    function NetIncome(Request $request) {
        $user_id=$request->header('id');
        $totalIncome = Income::where('user_id', $user_id)->sum('amount');
        $totalExpenses = Expense::where('user_id', $user_id)->sum('amount');
        return response()->json(["netIncome" => $totalIncome -$totalExpenses]);
    }
}
