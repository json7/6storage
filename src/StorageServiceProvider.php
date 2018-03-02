<?php
/**
 * Created by PhpStorm.
 * User: json
 * Date: 2018/3/1
 * Time: 下午5:40
 */

namespace json7\storage;

use Storage;
use League\Flysystem\Filesystem;
use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider {

    public function boot()
    {
        Storage::extend('storage', function($app, $config)
        {
            $accessId  = $config['access_id'];
            $accessKey = $config['access_key'];
            $adapter = new StorageAdapter();
            //Log::debug($client);
            $filesystem =  new Filesystem($adapter);

            $filesystem->addPlugin(new PutFile());
            $filesystem->addPlugin(new PutRemoteFile());
            //$filesystem->addPlugin(new CallBack());
            return $filesystem;
        });
    }

    public function register()
    {
        //
    }
}