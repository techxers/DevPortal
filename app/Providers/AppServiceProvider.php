<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider

{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);


        VerifyEmail::toMailUsing(function ($notifiable) {
            $verifyUrl = URL::temporarySignedRoute('verification.verify',
                //Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60))
                Carbon::now()->addMinutes(60),
                ['id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification())
                ]
            );
           /* return (new MailMessage())
                ->subject('What the damn')
                ->line("shit shit shit line lihe")
                ->action("Verify it ", $verifyUrl);
           */
            // Return your mail here...
            return (new MailMessage)
                ->subject('Verify Your Email(Neutron | VMS)')
                ->markdown('emails.verify', ['url' => $verifyUrl]);
        });
    }
}

