<?php 
namespace App\Actions;
use Psr\Container\ContainerInterface;

abstract class BaseAction
{
    protected $ci;
    
    public function __construct(ContainerInterface $ci)
    {

        $this->ci = $ci;
    }

    abstract public function __invoke($request, $response);

}