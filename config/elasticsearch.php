<?php

return [
    'host' => env('ELASTICSEARCH_HOST'),
    'user' => env('ELASTICSEARCH_USER'),
    'password' => env('ELASTICSEARCH_PASSWORD'),
    'cloud_id' => env('ELASTICSEARCH_CLOUD_ID'),
    'api_key' => env('ELASTICSEARCH_API_KEY'),
    'queue' => [
        'timeout' => env('SCOUT_QUEUE_TIMEOUT'),
    ],
    'indices' => [
        'mappings' => [
            'default' => [
                'properties' => [
                    'id' => [
                        'type' => 'keyword',
                    ],
                ],
            ],
            'categories' => [
                'properties' => [
                    'name' => [
                        'type' => 'text'
                    ],
                    'slug' => [
                        'type' => 'text'
                    ],
                    'parent_id' => [
                        'type' => 'integer'
                    ],
                    'sort' => [
                        'type' => 'integer'
                    ]
                ]
            ]
        ],
        'settings' => [
            'default' => [
                'number_of_shards' => 1,
                'number_of_replicas' => 0,
            ],
        ],
    ],
];
