<?php

namespace App\Channels;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Notifications\Notification;

class SmsChannel
{
    public function send(object $notifiable, Notification $notification): void
    {
        if (! method_exists($notification, 'toSms')) {
            Log::warning('Notification does not implement toSms().');
            return;
        }

        $phone = $notifiable->routeNotificationFor('sms');
        $message = $notification->toSms($notifiable);

        if (blank($phone) || blank($message)) {
            Log::warning('SMS skipped: phone or message is empty.', [
                'phone' => $phone,
                'message' => $message,
            ]);

            return;
        }

        if (! config('app.sms.enabled')) {
            Log::info('SMS sending is disabled in configuration.');
            return;
        }

        try {
            $response = Http::baseUrl(config('app.sms.base_url'))
                ->post('/api/smsapi', [
                    'api_key'  => config('app.sms.api_key'),
                    'senderid' => config('app.sms.sender_id'),
                    'type'     => config('app.sms.type'),
                    'number'   => $phone,
                    'message'  => $message,
                ]);

            if ($response->failed()) {
                Log::error('SMS sending failed.', [
                    'phone' => $phone,
                    'response' => $response->body(),
                ]);

                return;
            }

            Log::info('SMS sent successfully.', [
                'phone' => $phone,
                'response' => $response->body(),
            ]);
        } catch (\Throwable $e) {
            Log::error('SMS request exception.', [
                'phone' => $phone,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
