<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/check-db', function () {
    try {
        DB::connection()->getPdo();
        $status = "✅ Database connection is successful.";

        // Fetch data from `testtable`
        $data = DB::table('testtable')->get();
    } catch (\Exception $e) {
        $status = "❌ Database connection failed: " . $e->getMessage();
        $data = [];
    }

    return view('check-db', compact('status', 'data'));
});
