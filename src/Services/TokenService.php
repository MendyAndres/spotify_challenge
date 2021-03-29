<?php

namespace App\Services;

class TokenService extends BaseService
{   

    public function getToken($request, $response){
        
        $tokenClient = $this->setTokenClient();
        $clientId = $_ENV['CLIENT_ID'];
        $clientSecret = $_ENV['CLIENT_SECRET'];

        $response = $tokenClient->request('POST', $_ENV['SPOTIFY_TOKEN_URI'], [
            'auth' => [$clientId , $clientSecret],
            'form_params' => ['grant_type' => 'client_credentials'],
        ])->getBody();

        return json_decode($response);
    }
}