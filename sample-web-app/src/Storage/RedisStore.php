<?php
namespace App\Storage;

use Predis\Client;

class RedisStore implements StorageInterface
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function set(string $name, string $value) : void
    {
        $this->client->set($name, $value);
    }

    public function get(string $name) : string
    {
        return (string) $this->client->get($name);
    }

    public function getAll()
    {
        $keys = $this->client->keys("*");

        $tab = array();

        return $tab;
    }

    public function delete(string $name) : void
    {
        $this->client->set($name, null);
    }
}