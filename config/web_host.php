<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'language'=>'th',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'image' => [
                'class' => 'yii\image\ImageDriver',
                'driver' => 'GD',  //GD or Imagick
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '11223344556677889900',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            //'identityClass' => 'app\models\User',
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'db2' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=192.125.0.254;dbname=sriwilai',
            'username' => 'sriwilai',
            'password' => '11049',
            'charset' => 'utf8',
            'attributes' => array(
                PDO::MYSQL_ATTR_LOCAL_INFILE => true
            ),
        ],
    ],
    'modules' => [
        'pctclinic' => [
            'class' => 'app\modules\pctclinic\Module',
        ],
        'dynagrid' => [
            'class' => '\kartik\dynagrid\Module',
             ],
        'gridview' => [
            'class' => '\kartik\grid\Module',
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            'downloadAction' => 'gridview/export/download',
            'i18n' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@kvgrid/messages',
                //'basePath' => '@kvdetail/messages',
               // 'basePath' => '@kvdynagrid/messages',
                'forceTranslation' => true
              ]
            ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin']
        ],
    
],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    //$config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    //$config['bootstrap'][] = 'gii';
    //$config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
