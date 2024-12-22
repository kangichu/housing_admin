<?php

namespace App\Jobs;

use Exception;
use App\Models\MainUser;
use App\Mail\WelcomeMail;
use Illuminate\Bus\Queueable;
use App\Traits\EmailLoggerTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendWelcomeMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, EmailLoggerTrait;

    protected $user;
    protected $password;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(MainUser $user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->user;
        $business = $user->business;
        $password = $this->password;

        // Send the welcome email
        if($business->is_demo_account == 1) {
            $message = 'Welcome to ' . $business->business_name . '. Your account has been created successfully. Your login details are as follows: <br> Email: ' . $user->email . '<br> Password: ' . $password . '<br> Please note that this is a demo account and will expire in 14 days. <br> Thank you for choosing ' . $business->business_name . '.';
        } else {
            $message = 'Welcome to ' . $business->business_name . '. Your account has been created successfully. Your login details are as follows: <br> Email: ' . $user->email . '<br> Password: ' . $password . '<br> Thank you for choosing ' . $business->business_name . '.';
        }

        $mail = new WelcomeMail($user, $message);
        Mail::to($user->email)->send($mail);

        // Log the email
        $subject = $mail->subject ?? 'Welcome';
        $recipient = $user->email;
        $content = $mail->render();
        
        Log::info('Email details:', [
            'Subject' => $subject,
            'Recipient' => $recipient,
        ]);
    
        try {
            $this->logEmail($subject, $recipient, $content);
            Log::info('Email logged successfully');
        } catch (Exception $e) {
            Log::error('Email logging failed: ' . $e->getMessage());
        }
    }
}
