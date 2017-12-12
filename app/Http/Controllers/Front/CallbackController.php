<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;

class CallbackController extends Controller
{
    /**
     * Список новостей
     */
    public function index(Request $request)
    {
        //
        $name = $request->get('name');
        $phone = $request->get('phone');
        $message = $request->get('comment');

        //
        $name = mb_substr($name, 0, 255);
        $phone = preg_replace('/[^0-9]/', '', $phone);
        $message = !empty($message) ? 'Запчасти: ' . $message : null;

        if (!empty($name) && strlen($phone) > 4) {
            $this->sendMail($name, $phone, $message, $request->getHost());
        }

        return new \Illuminate\Http\Response('I work from site');
    }

    /**
     * @param string $name
     * @param string $phone
     * @param $request
     */
    protected function sendMail($name, $phone, $message = '', $host)
    {
        $body = sprintf(
            "Заявка на просчёт\n\tИмя: %s\n\tТелефон: %s\n\tСообщение: %s",
            $name,
            $phone,
            !empty($message) ? $message : '[ нет сообщения ]'
        );

        Mail::raw($body, function (Message $message) use ($host) {

            $subject = '[' . $host . '] Заявка с сайта';

            $message->to(env('MAIL_TO'));
            $message->subject($subject);
        });
    }
}
