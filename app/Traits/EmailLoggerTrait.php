<?php

namespace App\Traits;

use Exception;
use App\Models\EmailLog;
use Illuminate\Support\Facades\Log;

trait EmailLoggerTrait
{
    public function logEmail($subject, $recipient, $content)
    {
        try {
            $emailLog = new EmailLog();
            $emailLog->subject = $subject;
            $emailLog->recipient = $recipient;
            $emailLog->content = $content;
            $emailLog->save();
    
            Log::info("Email logged successfully");
        } catch (Exception $e) {
            Log::error('Error saving email log: ' . $e->getMessage());
        }
    }
}


