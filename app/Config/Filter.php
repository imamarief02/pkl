<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
    public $aliases = [
        'auth' => \App\Filters\AuthFilter::class,  // Menambahkan filter auth
    ];

    public $globals = [
        'before' => [
            // Filter autentikasi berlaku untuk semua route
            'auth' => ['except' => ['login', 'register']], // kecuali route login dan register
        ],
        'after'  => [
            // Filter lain setelah request dijalankan (tidak perlu dalam kasus ini)
        ],
    ];

    public $methods = [];

    public $filters = [];
}
