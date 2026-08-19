<?php

return [

    'paths' => [
        resource_path('views'),
    ],

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        env('VERCEL', false)
            ? sys_get_temp_dir().'/laravel-views'
            : storage_path('framework/views')
    ),

];