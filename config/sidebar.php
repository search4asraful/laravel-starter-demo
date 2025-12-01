<?php

return [
    [
        'group' => 'MAIN MENU',
        'items' => [
            [
                'icon' => 'fa-solid fa-folder',
                'name' => 'Parent Menu',
                'children' => [
                    ['name' => 'Child Menu', 'route' => 'test', 'icon' => 'fa-solid fa-minus'],
                ]
            ],
            [
                'icon' => 'fa-solid fa-file',
                'name' => 'Single Menu',
                'route' => 'test2'
            ],
        ]
    ],
];
