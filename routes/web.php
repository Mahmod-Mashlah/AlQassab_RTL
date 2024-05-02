<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/data-table', function () {
    return view('datatable-example');
});

Route::get('/new', function () {
    return view('new');
});
