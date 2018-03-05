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
        Storage::extend('Storage6', function($app, $config)
        {
            $accesskey  = $config['key'];
            $accessapi  = $config['api'];
            $adapter = new StorageAdapter($accessapi, $accesskey);
            $filesystem =  new Filesystem($adapter);
            return $filesystem;
        });
    }

    public function register()
    {
        //
    }
}
