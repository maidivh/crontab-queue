<?php
defined('APP_PATH') || define('APP_PATH', realpath('.'));

return new \Phalcon\Config([
    'database' => [
        'adapter'     => 'Mysql',
        //'host'        => '117.50.18.249',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => 'root',
        'dbname'      => 'mdvtrw',
        'charset'     => 'utf8mb4',
        "persistent"  => true
    ],
    'application' => [
        'frontend' => [
            'controllersDir' => APP_PATH . '/apps/frontend/controllers/',
            'viewsDir' => APP_PATH . '/apps/frontend/views/',
            'cacheDir' => APP_PATH . '/apps/frontend/cache/',
            //模块在URL中的pathinfo路径名
            'module_pathinfo' => '/',
            //前台静态资源URL
            'assets_url' => '/',
        ],
        'backend' => [
            'controllersDir' => APP_PATH . '/apps/backend/controllers/',
            'viewsDir' => APP_PATH . '/apps/backend/views/',
            'cacheDir' => APP_PATH . '/apps/backend/cache/',
            //模块在页面的请求路径前缀，如 passport/save => /console/passport/save
            'module_pathinfo' => '/console/',
            //后台静态资源URL
            'assets_url' => '/',
        ],
        'mobile'=>[
            'viewDir' =>APP_PATH.'/apps/frontend/views/mobile/',
        ],
        'modelsDir' => APP_PATH . '/apps/models/',
        'libraryDir' => APP_PATH . '/apps/library/',
        'dbschemaDir'    => APP_PATH . '/apps/dbschema/',
        'vendorDir' => APP_PATH . '/apps/vendor/',
        'pluginsDir' => APP_PATH . '/apps/plugins/',
        'migrationsDir' => APP_PATH . '/apps/migrations/',
        'logDir' => APP_PATH . '/apps/logs/',
        'cryptSalt'      => 'eEAfR|_&G&f,+vU]:jFr!!A&+71w1Ms9~8_4L!<@[N@DyaIP_2My|:+.u>/6m,$D',
        'env'            =>'dev',   // 缓存，dev：开发环境；其他默认为线上环境
    ],

    // REDIS
    'redis'         => [
        'development' => [
            'host'       => '192.168.10.10',
            'port'       => 6379,
            'timeout'    => 60,
            'auth'       => '',
            'persistent' => false,
        ],
        'product'  => [
            'host'       => '192.168.10.10',
            'port'       => 6379,
            'timeout'    => 60,
            'auth'       => '',
            'persistent' => false,
        ],
    ],
    // mongo
    'mongo'         => [
        'development' => [
            'host'       => '192.168.10.10',
            'username'   => null,
            'password'   => null,
            'port'       => 28017,
            'timeout'    => 60,
            'persistent' => false,
            'dbname'     =>'pianyijiaowo'
        ],
        'production'  => [
            'host'       => '192.168.10.10',
            'username'   => null,
            'password'   => null,
            'port'       => 27017,// 27017
            'timeout'    => 60,
            'persistent' => false,
            'dbname'     =>'pianyijiaowo'
        ],
    ],
    // 上传
    'upload' =>[
        'default' =>'local',
        'drivers' =>[
            'local'=>[
                'rootPath'=> APP_PATH.'/public/upload/',
                'subName' => ['date' ,'Ymd'],
                'domain'  => '/public/upload/',
                'exts'    => ['jpg', 'gif', 'png', 'jpeg'],
                'driverConfig' =>null
            ]
        ]
    ],
    // 时区
    'datetime_zone' => 'Asia/Shanghai',

    'queue' =>[
        'default' => 'database',
        'connections' => [
            'redis' => [
                'driver' => 'redis',
                'connection' => 'default',
                'queue' => 'default',
                'expire' => 60,
            ],
            'database' => [
                'driver' => 'database',
                'table' => 'jobs',
                'queue' => 'default',
                'expire' => 60,
            ],
        ],
        'process'=>[
            'quick' =>20
        ]
    ],
    'cron' =>[
        'default' => 'database',
        'provider' => [
            'file' => [
                'driver' => 'file',
                'file' => APP_PATH . '/apps/task_config/crontab.php',
            ],
            'database' => [
                'driver' => 'database',
                'table' => 'crontab',
            ],
        ]
    ],
    'api'=>[
        'translation'=>'http://106.75.227.183',
        //'translation'=>'http://translation.local',
        'cdh' => '10.216.250.101:58888',
        'seven' => 'http://seven.local'
    ],
    'solr' =>[
        'endpoint' => [
            'localhost' => array(
                'host' => 'localhost',
                'port' => '8983',
                'path' => '/solr',
                'core'=>'test'
            )
        ]
    ]
]);
