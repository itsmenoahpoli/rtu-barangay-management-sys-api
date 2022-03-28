<?php

namespace App\Services;

use Mail;

class EmailService
{
    public function sendRawMail($payload)
    {
        try
        {
            $to = $payload['to'];
            $subject = $payload['subject'];
            $body = $payload['body'];

            Mail::raw($body, function ($message) use ($subject, $to)
            {
                $message->subject($subject);
                $message->from('system@pitogo-portal.com');
                $message->to($to);
            });

            return true;
        } catch (Exception $error)
        {
            throw $error->getMessage();
        }
    }
}
