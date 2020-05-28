<?php

return [
    'role_structure' => [
        'super_admin' => [
            'users' => 'c,r,u,d,p',
            'pages' => 'c,r,u,d',
            'main_data' => 'c,r,u,d',
            'printusers' => 'p',
            'categories' => 'c,r,u,d,p',
           
        ],
        'admin' => [],
           
           
      
       
    ],
    
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'p' => 'print'
    ]
];
