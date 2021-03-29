<?php
require 'vendor/autoload.php';

use App\Services\SpotifyService;
use App\Services\TokenService;
use App\Services\Helpers\SpotifyHelper;
use Dotenv\Dotenv;

$config = ['settings' => [
    'addContentLengthHeader' => false,
    'displayErrorDetails' => true
]];

$app = new \Slim\App($config);

//require the routes.
require __DIR__ . "/src/Domains/routes.php";

//set .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

//dependencies injection.
$container = $app->getContainer();

$container['spotify_service'] = function ($c){
    return new SpotifyService($c);
};

$container['token_service'] = function ($c){
    return new TokenService($c);
};

$container['SpotifyAlbumsAction'] = function ($c){
    return new App\Actions\BaseAction($c);
};

$container['spotify_helper'] = function($c){
    return new SpotifyHelper($c);
};

//Configuration done
$app->run();
