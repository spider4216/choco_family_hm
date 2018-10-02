<?php

use app\modules\chocouser\services\TownService;
use app\modules\chocouser\services\UserService;

return [
    'components' => [
        'subject' => [
            'class' => UserService::class,
        ],
        
        'town' => [
            'class' => TownService::class,
        ],
    ],
];