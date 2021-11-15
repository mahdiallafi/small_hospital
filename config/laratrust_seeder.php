<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'admin' => [
            'users' => 'r,c,u,d',
            'services' => 'c,r,u,d',
            'reports' => 'r,d',
            'notfication'=>'c,u,d'
        ],
        'doctor' => [
            'users' => 'c,r,u,d',
            'doctors' => 'c,r,u,d',
            'statues' => 'c,r,u,d',
            'reports'=>'c'
        ],
        'user' => [
            'users'=>'c,r,u,d'
            'services' => 'r',
            'reports' => 'c',
            'appointments' => 'c',
            'notfication'=>'r'
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
