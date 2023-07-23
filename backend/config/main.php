<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'csrfCookie' => [
                'httpOnly' => true,
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_identity-backend',
                'httpOnly' => true
            ],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
            'cookieParams' => [
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                '/news' => 'news/index',
                '/news/<id:\d+>' => 'news/view',
                '/news/create' => 'news/create',
                '/news/update/<id:\d+>' => 'news/update',
                '/news/delete/<id:\d+>' => 'news/delete',
                '/profile' => 'profile/index',
                '/profile/<id:\d+>' => 'profile/view',
                '/profile/create' => 'profile/create',
                '/profile/update/<id:\d+>' => 'profile/update',
                '/profile/delete/<id:\d+>' => 'profile/delete',
                '/language' => 'language/index',
                '/language/<id:\d+>' => 'language/view',
                '/language/create' => 'language/create',
                '/language/update/<id:\d+>' => 'language/update',
                '/language/delete/<id:\d+>' => 'language/delete',
                '/login' => 'site/login',
                '/logout' => 'site/logout',

            ],
        ],

    ],
    'params' => $params,
];
