<?php

namespace App\Providers;

use App\Mail\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();

      VerifyEmail::toMailUsing(function ($notifiable , $url) {
          return (new MailMessage)
              ->subject('Verify Email Address')
              ->greeting('Hello ' . $notifiable->name)
              ->action('Verify Email Address', $url);

      });



    }
}
