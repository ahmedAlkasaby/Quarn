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
            'roles' => 'c,r,u,d',
            'admins' => 'c,r,u,d',
            'students' => 'c,r,u,d',
            'teachers' => 'c,r,u,d',
            'circles' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        'manger' => [
            'roles' => 'c,r,u',
            'admins' => 'c,r,u',
            'profile' => 'r,u',
            'students' => 'c,r,u',
            'teachers' => 'c,r,u',
            'circles' => 'c,r,u',
        ],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
