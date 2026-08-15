<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\HttpFoundation\Response;

class SettingsController extends Controller
{

    public function index()
    {
        return response()->json([
            'general' => setting('general', []),
            'contact' => setting('contact', []),
            'popup' => setting('popup', []),
        ]);
    }


    public function general(Request $request)
    {
        $request->validate([
            'site_name' => ['required', 'string', 'max:255'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'theme_color' => ['nullable', 'string', 'max:20'],
            'dark_mode' => ['boolean'],
            'language' => ['nullable', 'string', 'max:10'],
            'timezone' => ['nullable', 'string', 'max:100'],
            'website_url' => ['nullable', 'url'],
            'maintenance_mode' => ['boolean'],
        ]);


        setting([
            'general' => [
                'site_name' => $request->input('site_name', ''),
                'tagline' => $request->input('tagline', ''),
                'theme_color' => $request->input('theme_color', ''),
                'dark_mode' => $request->input('dark_mode', ''),
                'language' => $request->input('language', ''),
                'timezone' => $request->input('timezone', ''),
                'website_url' => $request->input('website_url', ''),
                'maintenance_mode' => $request->input('maintenance_mode', ''),
            ],
        ])->save();

        return response()->json([
            'message' => 'Settings successfully.',
            'general' => setting('general', []),
        ]);
    }


    public function contact(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:1000'],
            'facebook' => ['nullable', 'url', 'max:500'],
            'instagram' => ['nullable', 'url', 'max:500'],
            'youtube' => ['nullable', 'url', 'max:500'],
            'tiktok' => ['nullable', 'url', 'max:500'],
            'twitter' => ['nullable', 'url', 'max:500'],
            'linkedin' => ['nullable', 'url', 'max:500'],
            'whatsapp' => ['nullable', 'string', 'regex:/^[0-9]{10,15}$/',],
        ]);

        setting([
            'contact' => [
                'phone' => $request->input('phone', ''),
                'email' => $request->input('email', ''),
                'address' => $request->input('address', ''),
                'whatsapp' => $request->input('whatsapp', ''),
                'facebook' => $request->input('facebook', ''),
                'instagram' => $request->input('instagram', ''),
                'youtube' => $request->input('youtube', ''),
                'tiktok' => $request->input('tiktok', ''),
                'twitter' => $request->input('twitter', ''),
                'linkedin' => $request->input('linkedin', ''),
            ],
        ])->save();

        return response()->json([
            'message' => 'Contact updated successfully.',
            'contact' => setting('contact', []),
        ]);
    }


    public function popup(Request $request)
    {
        $request->validate([
            'enabled' => ['required', 'boolean'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'coupon_code' => ['nullable', 'string', 'max:100'],
            'button_text' => ['nullable', 'string', 'max:100'],
        ]);


        setting([
            'popup' => [
                'enabled' => (bool) $request->input('enabled', ''),
                'title' => $request->input('title', ''),
                'subtitle' => $request->input('subtitle', ''),
                'description' => $request->input('description', ''),
                'coupon_code' => $request->input('coupon_code', ''),
                'button_text' => $request->input('button_text', ''),
            ],
        ])->save();


        return response()->json([
            'message' => 'Popup updated successfully.',
            'popup' => setting('popup', []),
        ]);
    }

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
