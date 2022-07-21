<?php
    include __DIR__."/vendor/autoload.php";
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/Model", ".env.Connection");
    $dotenv->load();
    return [
        'paths' => [
            'migrations' => 'Database/Migration'
        ],
        'environments' => [
            'default' => [
                'adapter' => $_ENV['ADAPTER'],
                'host' => $_ENV['HOST'],
                'name' => $_ENV['DBNAME'],
                'user' => $_ENV['USER'],
                'pass' => $_ENV['PASSWORD']
            ]
        ]
    ];
?>