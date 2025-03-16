<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    
            // عرض قائمة المحادثات
            public function index()
            {
                $userId = Auth::id();
                // جلب المحادثات التي يكون المستخدم طرفًا فيها
                $chatUsers = Chat::where('sender_id', $userId)
                    ->orWhere('receiver_id', $userId)
                    ->with(['sender', 'receiver'])
                    ->orderBy('created_at', 'desc')
                    ->get()
                    ->unique(function ($chat) use ($userId) {
                        return $chat->sender_id == $userId ? $chat->receiver_id : $chat->sender_id;
                    });
        
                return view('backend.admin.messages.index', compact('chatUsers'));
            }
        
            // جلب الرسائل بين مستخدمين
            public function getMessages(Request $request)
            {
                $userId = Auth::id();
                $receiverId = $request->receiver_id;
        
                // جلب الرسائل بين المستخدم الحالي والمستلم
                $messages = Chat::where(function ($query) use ($userId, $receiverId) {
                        $query->where('sender_id', $userId)->where('receiver_id', $receiverId);
                    })
                    ->orWhere(function ($query) use ($userId, $receiverId) {
                        $query->where('sender_id', $receiverId)->where('receiver_id', $userId);
                    })
                    ->orderBy('created_at', 'asc')
                    ->get();
        
                // تحديث حالة الرسائل إلى "تم القراءة"
                Chat::where('sender_id', $receiverId)
                    ->where('receiver_id', $userId)
                    ->update(['seen' => 1]);
        
                return response()->json($messages);
            }
        
            // إرسال رسالة جديدة
            public function sendMessage(Request $request)
            {
                $request->validate([
                    'receiver_id' => 'required|exists:users,id',
                    'message' => 'required|string',
                ]);
        
                // إنشاء رسالة جديدة
                $message = Chat::create([
                    'sender_id' => Auth::id(),
                    'receiver_id' => $request->receiver_id,
                    'message' => $request->message,
                    'seen' => 0,
                ]);
        
                return response()->json([
                    'status' => 'success',
                    'message' => 'تم إرسال الرسالة بنجاح',
                    'data' => $message,
                ]);
            }
}
