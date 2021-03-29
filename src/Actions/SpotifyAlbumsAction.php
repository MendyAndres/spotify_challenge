<?php 
namespace App\Actions;

class SpotifyAlbumsAction extends BaseAction
{

    public function __invoke($request, $response)
    {

        //get neccessary parameters
        //get artist name from query params
        $artis_name = $request->getQueryParams();
        $token = $this->ci->token_service->getToken($request, $response);

        $artist_id = $this->ci->spotify_service->getArtistId($artis_name['q'], $token);
        $artist_albums = $this->ci->spotify_service->getArtistAlbums($artist_id, $token);

        return $response->withJson($artist_albums);
    }

}