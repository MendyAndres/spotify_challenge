<?php 

namespace App\Services;
use GuzzleHttp\Client;
use Psr\Container\ContainerInterface;



class BaseService {
    
    protected $client;
    protected $ci;
    
    public function __construct(ContainerInterface $ci)
    {
        $this->ci = $ci;
    }


    public function setTokenClient(){
        $this->client = new Client();
        
        return $this->client;
    }

}