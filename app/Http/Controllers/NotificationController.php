<?php

namespace App\Http\Controllers;

use App\Models\Lessor;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function markAsRead($id , Lessor $lessor)
    {
        // Find the notification by ID
        $notification = $lessor->notifications()->find($id);

        if ($notification) {
            // Mark the notification as read
            $notification->markAsRead();
            $notification->delete();

            return redirect()->back()->with('success', 'Notification marked as read.');
        }

        return redirect()->back()->with('error', 'Notification not found.');
    }

    public function delete(Request $request, $id)
    {
        // $notification = Notification::find($id);
        // $notification->deleteNotification(); // Call the custom deleteNotification() method

        $notification = Notification::find($id);

        if ($notification) {
            $notification->delete();
            return redirect()->back()->with('success', 'Notification deleted successfully.');
        }

        return redirect()->back()->with('error', 'Failed to delete the notification.');
    }
}
