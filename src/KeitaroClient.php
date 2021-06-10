<?php 
namespace Ihorhnatchuk\LaravelKeitaro;

class KeitaroClient
{
    public function execute(string $trackerUrl, string $token)
    {
        return new KClient($trackerUrl, $token);
    }
}