<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\View\ViewServiceProvider;

define('LARAVEL_START', microtime(true));

if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__ . '/../vendor/autoload.php';

/** @var Application $app */
$app = require __DIR__ . '/../bootstrap/app.php';

// Register Laravel's view service explicitly for the Vercel runtime.
$app->register(ViewServiceProvider::class);

$app->handleRequest(Request::capture());