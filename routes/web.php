<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\IncomeExpenseCondition;
use App\Http\Middleware\TokenVarificationMiddleware;


//API Route
Route::post('/user-registration', [UserController::class, 'UserRegistration']);
Route::post('/user-login', [UserController::class, 'UserLogin']);
Route::post('/send-otp', [UserController::class, 'SendOTPCode']);
Route::post('/verify-otp', [UserController::class, 'VerifyOTP']);
Route::post('/reset-password', [UserController::class, 'ResetPassword'])
->middleware([TokenVarificationMiddleware::class]);

Route::get('/user-profile', [UserController::class, 'UserProfile'])->middleware([TokenVarificationMiddleware::class]);
Route::post('/user-update', [UserController::class, 'UpdateProfile'])->middleware([TokenVarificationMiddleware::class]);

//logout
Route::get('/logout',[UserController::class, 'UserLogout']);


//Page Route
Route::get('/userLogin',[UserController::class, 'LoginPage']);
Route::get('/userRegistration',[UserController::class, 'RegistrationPage']);
Route::get('/sendOtp',[UserController::class, 'SendOtpPage']);
Route::get('/verifyOtp',[UserController::class, 'VerifyOtpPage']);
Route::get('/resetPassword',[UserController::class, 'ResetPasswordPage'])->middleware([TokenVarificationMiddleware::class]);
Route::get('/dashboard',[DashboardController::class, 'DashboardPage'])->middleware([TokenVarificationMiddleware::class]);
Route::get('/userProfile',[UserController::class, 'ProfilePage'])->middleware([TokenVarificationMiddleware::class]);


Route::get('/incomePage',[IncomeController::class, 'IncomePage'])->middleware([TokenVarificationMiddleware::class]);
//Income API Route
Route::post('/create-income',[IncomeController::class, 'IncomeCreate'])->middleware([TokenVarificationMiddleware::class]);
Route::post('/delete-income',[IncomeController::class, 'IncomeDelete'])->middleware([TokenVarificationMiddleware::class]);
Route::get('/list-income',[IncomeController::class, 'IncomeList'])->middleware([TokenVarificationMiddleware::class]);
Route::post('/update-income',[IncomeController::class, 'IncomeUpdate'])->middleware([TokenVarificationMiddleware::class]);
Route::post('/income-by-id',[IncomeController::class, 'IncomeById'])->middleware([TokenVarificationMiddleware::class]);


Route::get('/expensePage',[ExpenseController::class, 'ExpensePage'])->middleware([TokenVarificationMiddleware::class]);
//Expense API Route
Route::post('/create-expense',[ExpenseController::class, 'ExpenseCreate'])->middleware([TokenVarificationMiddleware::class]);
Route::post('/delete-expense',[ExpenseController::class, 'ExpenseDelete'])->middleware([TokenVarificationMiddleware::class]);
Route::get('/list-expense',[ExpenseController::class, 'ExpenseList'])->middleware([TokenVarificationMiddleware::class]);
Route::post('/update-expense',[ExpenseController::class, 'ExpenseUpdate'])->middleware([TokenVarificationMiddleware::class]);
Route::post('/expense-by-id',[ExpenseController::class, 'ExpenseById'])->middleware([TokenVarificationMiddleware::class]);


Route::get('/netIncome',[IncomeExpenseCondition::class, 'NetIncome'])->middleware([TokenVarificationMiddleware::class]);

