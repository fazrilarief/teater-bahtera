<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Telegram\Bot\Api;
use App\Models\AnnouncementHistories;
use Telegram\Bot\FileUpload\InputFile;

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
        $chatId = env('TELEGRAM_SUPERGROUP_ID');
        $message = $request->input('message');
        $footer = $request->input('footer');
        $user = Auth()->user()->username;

        // Inisialisasi variabel $filePath dan $fileName
        $filePath = null;
        $fileName = null;

        if ($request->file('file') != null) {
            $filePath = $request->file('file')->getPathname();
            $fileName = $request->file('file')->getClientOriginalName();
        }

        // Membuat array data berdasarkan kondisi
        $data = ($filePath && $fileName != null)
            ? [
                'chat_id' => $chatId,
                'chat' => $message,
                'message_by' => $user,
                'document' => $fileName,
            ]
            : [
                'chat_id' => $chatId,
                'chat' => $message,
                'message_by' => $user,
            ];

        if ($data) {
            // Mengirim pesan atau dokumen ke Telegram berdasarkan kondisi
            $this->sendTelegramMessage($chatId, $message, $footer, $filePath, $fileName);

            // Menangani keberhasilan pengiriman
            Alert::success('success', 'Pesan berhasil terkirim!!');
            return redirect()->back();
        } else {
            // Menangani kesalahan jika rekaman tidak berhasil dibuat
            return abort(500);
        }
    }

    private function sendTelegramMessage($chatId, $message, $footer, $filePath, $fileName)
    {
        if ($filePath && $fileName != null) {
            $this->telegram->sendDocument([
                'chat_id' => $chatId,
                'document' => InputFile::create($filePath, $fileName),
                'caption' => $message . "\n\n" . $footer,
            ]);
        } else {
            $this->telegram->sendMessage([
                'chat_id' => $chatId,
                'text' => $message . "\n\n" . $footer,
            ]);
        }
    }
}
