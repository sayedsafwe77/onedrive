<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;

class GoogleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        \Storage::extend('google',function($app,$config){
            $client = new \Google_Client();
            $client->setClientId($config['clientId']);
            $client->setClientSecret($config['clientSecret']);
            $client->setAccessToken($config['accessToken']);
            $client->setScopes(['https://www.googleapis.com/auth/drive']);
            $service = new \Google_Service_Drive($client);
            $adaptor = new \App\Services\GoogleDriveStorage($service,$config['folderId']);
            return new Filesystem($adaptor);

        });
    }
}
