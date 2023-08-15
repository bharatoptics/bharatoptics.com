<?php
return [
    'backend' => [
        'frontName' => 'admin'
    ],
    'remote_storage' => [
        'driver' => 'file'
    ],
    'queue' => [
        'consumers_wait_for_messages' => 1
    ],
    'crypt' => [
        'key' => '02ff346f2d9e7219efbfff80f94c92e0'
    ],
    'db' => [
        'table_prefix' => '',
        'connection' => [
            'default' => [
                'host' => 'localhost',
                'dbname' => 'rjgmajfavv',
                'username' => 'rjgmajfavv',
                'password' => '24YfnpFAKw',
                'model' => 'mysql4',
                'engine' => 'innodb',
                'initStatements' => 'SET NAMES utf8;',
                'active' => '1',
                'driver_options' => [
                    1014 => false
                ]
            ]
        ]
    ],
    'resource' => [
        'default_setup' => [
            'connection' => 'default'
        ]
    ],
    'x-frame-options' => 'SAMEORIGIN',
    'MAGE_MODE' => 'developer',
    'session' => [
        'save' => 'files'
    ],
    'cache' => [
        'frontend' => [
            'default' => [
                'id_prefix' => '3f8_'
            ],
            'page_cache' => [
                'id_prefix' => '3f8_'
            ]
        ],
        'allow_parallel_generation' => false,
        'graphql' => [
            'id_salt' => 'sNfGCg3WXWoKttvch8zr4PDpvwD35Pjc'
        ]
    ],
    'lock' => [
        'provider' => 'db'
    ],
    'directories' => [
        'document_root_is_pub' => true
    ],
    'cache_types' => [
        'config' => 1,
        'layout' => 1,
        'block_html' => 1,
        'collections' => 1,
        'reflection' => 1,
        'db_ddl' => 1,
        'compiled_config' => 1,
        'eav' => 1,
        'customer_notification' => 1,
        'config_integration' => 1,
        'config_integration_api' => 1,
        'full_page' => 1,
        'config_webservice' => 1,
        'translate' => 1
    ],
    'downloadable_domains' => [
        'phplaravel-928226-3221881.cloudwaysapps.com'
    ],
    'install' => [
        'date' => 'Sat, 07 Jan 2023 02:46:39 +0000'
    ],
    'http_cache_hosts' => [
        [
            'host' => 'bharatoptics.com',
            'port' => '8080'
        ],
        [
            'host' => 'www.bharatoptics.com',
            'port' => '8080'
        ],
        [
            'host' => '127.0.0.1',
            'port' => '8080'
        ],
        [
            'host' => 'phplaravel-928226-3221881.cloudwaysapps.com',
            'port' => '8080'
        ]
    ]
];
