<?php
return [
   'role_structure' => [
       'superadministrator' => [
           'users' => 'c,r,u,d',
           'acl' => 'c,r,u,d',
           'profile' => 'r,u'
       ],
       'administrator' => [
           'users' => 'c,r,u,d',
           'profile' => 'r,u'
       ],
       'editor' => [
            'profile' => 'r,u'
       ],
        'autor' => [
            'profile' => 'r,u'
        ],
        'contributer' => [
            'profile' => 'r,u'
        ],
        'subscriber' => [
            'profile' => 'r,u'
        ],
        'suppoter' => [
            'profile' => 'r,u'
        ],
   ],
   'permission_structure' => [
       'cru_user' => [
           'profile' => 'c,r,u'
       ],
   ],
   'permission_map' =>[
        'c'=>'create',
        'r'=>'read',
        'u'=>'update',
        'd'=>'delete'   
   ]

];