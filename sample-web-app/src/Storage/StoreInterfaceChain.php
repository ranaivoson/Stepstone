<?php
namespace App\Storage;


class StoreInterfaceChain implements StorageInterface
{
    /**
     * @var array
     */
    private $store;

    /**
     * StoreInterfaceChain constructor.
     */
    public function __construct()
    {
        $this->store = array();
    }

    public function addStore(StorageInterface $store)
    {
        $this->store[] = $store;
    }

    public function set(string $name, string $value): void
    {
        foreach ($this->store as $store){
            $store->set($name, $value);
            break;
        }
    }

    public function get(string $name): string
    {
        // TODO: Implement get() method.
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function delete(string $name): void
    {
        // TODO: Implement delete() method.
    }


}