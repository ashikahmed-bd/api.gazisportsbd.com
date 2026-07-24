<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\HttpFoundation\Response;

class SettingController extends Controller
{
    public function seed(Request $request)
    {
        Artisan::call('optimize:clear');

        Artisan::call('migrate:fresh', [
            '--seed' => true,
            '--force' => true,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Database seeded successfully.',
        ], Response::HTTP_OK);
    }

    public function reboot(Request $request)
    {
        artisan::call('route:clear');
        artisan::call('optimize:clear');

        return response()->json([
            'success' => true,
            'message' => 'Cache cleared successfully!',
        ], Response::HTTP_OK);
    }

    public function storageLink()
    {
        Artisan::call('storage:link');

        return response()->json([
            'status' => 'success',
            'message' => 'Storage link created successfully.',
        ]);
    }
}
