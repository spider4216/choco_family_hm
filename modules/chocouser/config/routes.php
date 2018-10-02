<?php

return [
    'POST user' => 'chocouser/user/create',
    'GET users' => 'chocouser/user/user-list',
    'GET user/<id:\d+>' => 'chocouser/user/user-detail',
    'GET users/count' => 'chocouser/user/user-count',
    'GET towns' => 'chocouser/towns/all',
];