<?php
use \yii\web\Request;
$baseUrl = str_replace('/web','',(new Request)->getBaseUrl());
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
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
        ],
		'i18n' => [
			'translations' => [
				'backend' => [
					'class' => 'yii\i18n\PhpMessageSource',
					//'basePath' => '@common/messages',
					'sourceLanguage' => 'en',
					'fileMap'=>[
						'backend'=>'backend.php',
						'backend/error'=>'error_backend.php',
					]
				],
			],
		],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request'=>[
          'baseUrl'=>$baseUrl
        ],
        'urlManager' => [
            'baseUrl'=>$baseUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
	'as beforeRequest'=>[
		'class'=>'backend\components\CheckIfLoggedIn',
	],
    'params' => $params,
];