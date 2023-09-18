<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\Midtrans\CallbackService;
use Illuminate\Support\Facades\Log;

class PaymentCallbackController extends Controller
{
    public function receive()
    {
        $callback = new CallbackService;
 
        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();

            Log::info('Notification data: ' . json_encode($notification->toArray())); // Log the notification data
            
            $order = $notification->getOrder();
 
            if ($notification->isSuccess()) {
                Order::where('id', $order->id)->update([
                    'payment_status' => 2,
                ]);
            }
 
            if ($notification->isExpire()) {
                Order::where('id', $order->id)->update([
                    'payment_status' => 3,
                ]);
            }
 
            if ($notification->isCancelled()) {
                Order::where('id', $order->id)->update([
                    'payment_status' => 4,
                ]);
            }
 
            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notifikasi berhasil diproses',
                ]);
        } else {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key tidak terverifikasi',
                ], 403);
        }
    }
}