<?php

namespace App\Services;

class SpotifyService extends BaseService
{

    public function getArtistId($name, $token)
    {

        $spotifyClient = $this->setTokenClient();

        $response = $spotifyClient->request('GET', $_ENV['SPOTIFY_QUERY_URI'], [
            'query' => [
                'query' => $name,
                'type' => 'artist'
            ],
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => $token->token_type. ' ' . $token->access_token
            ]
            
        ])->getBody();


        $response = json_decode($response);
        $artis_id = $response->artists->items[0]->id;
        
        return $artis_id;
    }

    public function getArtistAlbums($artis_id, $token){

        $spotifyClient = $this->setTokenClient();

        $response = $spotifyClient->request('GET', $_ENV['SPOTIFY_ALBUMS_URI'].$artis_id.'/albums', [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => $token->token_type. ' ' . $token->access_token
            ]
            
        ])->getBody();

        $response = json_decode($response);

        $format_response = $this->ci->spotify_helper->formatAlbumsResponse($response);

        return $format_response;

    }


}