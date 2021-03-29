<?php

$config = ['settings' => [
    'addContentLengthHeader' => false,
    "displayErrorDetails" => true,
]];




$app->group('/api', function ($app){
    $app->get('/v1/albums', App\Actions\SpotifyAlbumsAction::class);
});

