<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{

    function ExpensePage() {
        return view('pages.dashboard.expense-page');
    }
    
    function ExpenseCreate (Request $request) {
        $user_id=$request->header('id');
        return Expense::create([
            'amount' =>$request->input('amount'),
            'description' =>$request->input('description'),
            'date' =>$request->input('date'),
            'category' =>$request->input('category'),
            'user_id' => $user_id
        ]);
    }

    function ExpenseDelete (Request $request) {
        $income_id = $request->input('id');
        $user_id=$request->header('id');
        return Expense::where('id', $income_id)
        ->where('user_id', $user_id)
        ->delete();
    }

    function ExpenseList (Request $request) {
        $user_id=$request->header('id');
        return Expense::where('user_id',$user_id)->get();
    }

    function ExpenseUpdate (Request $request) {
        $income_id = $request->input('id');
        $user_id = $request->header('id');
        return Expense::where('id', $income_id)
        ->where('user_id', $user_id)
        ->update([
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'category' => $request->input('category'),
        ]);
    }

    function ExpenseById (Request $request) {
        $income_id = $request->input('id');
        $user_id=$request->header('id');
        return Expense::where('id', $income_id)
        ->where('user_id', $user_id)
        ->first();
    }
}
