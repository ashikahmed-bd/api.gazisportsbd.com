<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'success' => true,
        'message' => 'Server is running successfully.',
        'application' => config('app.name'),
        'environment' => app()->environment(),
        'version' => app()->version(),
        'timestamp' => now()->toIso8601String(),
    ]);
});
