<?php
namespace App\Factory;

use Symfony\Component\Cache\Adapter\RedisAdapter;

class RedisStaticFactory
{
    public static function createRedisConnexion() {
        try {
            $client = RedisAdapter::createConnection(
                'redis://redis:6379'
            );
        }
        catch (\Exception $e){
            die($e->getMessage());
        }
        return $client;
    }
}