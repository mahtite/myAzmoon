<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('recaptcha',function (){
            return'
              <script src="https://www.google.com/recaptcha/api.js?h1=fa" async defer></script>
              
              <div class="row mb-3">
                 <label for="" class="col-md-4 col-form-label text-md-end"></label>
                 <div class="col-md-6 g-recaptcha" data-sitekey="{{ env(\'GOOGLE_RECAPTCHA_SITE_KEY\') }}"></div>
              </div>
        ';
        });
    }
}
