# laravel-queue-aliyun-mns

This is a queue adapter for the Aliyun MNS

## Installation

```bash
composer require larva/laravel-queue-aliyun-mns
```

## for Laravel

This service provider must be registered.

```php
// config/app.php

'providers' => [
    '...',
    Larva\Queue\AliyunMNS\AliyunMnsServiceProvider::class,
];
```

edit the config file: config/queue.php

add config

```php
        'mns' => [
            'driver' => 'mns',
            'access_id' => env('MNS_ACCESS_ID', 'your-access-key-id'),
            'access_key' => env('MNS_ACCESS_KEY', 'your-access-key-secret'),
            'security_token' => env('MNS_SECURITY_TOKEN', 'your-security-token'),
            'endpoint' => 'http(s)://{AccountId}.mns.cn-hangzhou.aliyuncs.com',
            'queue' => 'default'
        ],
```

change default to mns

```php
    'default' => 'mns'
```

## Use

see [Laravel wiki](https://laravel.com/docs/5.7/queues)
