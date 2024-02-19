<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Telegram\Bot\Api;
use App\Models\AnnouncementHistories;

class TelegramBotController extends Controller
{
    public function index()
    {
        return view('pages.admin.tools.create-announcement');
    }

    public function __construct()
    {
        $this->telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
    }

    public function sendMessage(Request $request)
    {
        $chatId = (env('TELEGRAM_SUPERGROUP_ID'));
        $message = $request->input('message');
        $footer = $request->input('footer');
        $user = Auth()->user()->username;

        $data = AnnouncementHistories::create([
            'chat_id' => $chatId,
            'chat' => $message,
            'message_by' => $user,
        ]);

        if($data){
            $this->telegram->sendMessage([
                'chat_id' => $chatId,
                'text' => $message . "\n\n" . $footer,
            ]);

            Alert::success('success', 'Pesan berhasil terkirim!!');
            return redirect()->route('tools.create-announcement');
        }else{
            return abort(500);
        }
    }
}
