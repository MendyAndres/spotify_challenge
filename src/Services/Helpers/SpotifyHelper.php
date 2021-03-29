<?php

namespace App\Services\Helpers;
use Psr\Container\ContainerInterface;


class SpotifyHelper 
{

    protected $ci;
    
    public function __construct(ContainerInterface $ci)
    {
        $this->ci = $ci;
    }

    public function formatAlbumsResponse($albums){

        $artist_albums = array();
        foreach($albums->items as $album){

            $artist_albums[] = array(
                "name" => $album->name ,
                "released" => $album->release_date,
                "tracks" => $album->total_tracks,
                "cover" => (isset($album->images[0]) ? $album->images[0] : "The album doesn't have cover image.")
            );
        }

        return $artist_albums;
    }
}