<?php
namespace App\Storage;

class CryptoStore implements StorageInterface
{
    /**
     * @var StorageInterface
     */
    private $store;

    /**
     * @var CryptoAlgorithm
     */
    private $algorythm;

    /**
     * CryptoStore constructor.
     * @param StorageInterface $store
     * @param CryptoAlgorithm $algorythm
     */
    public function __construct(StorageInterface $store, CryptoAlgorithm $algorythm)
    {
        $this->store = $store;
        $this->algorythm = $algorythm;
    }

    public function set(string $name, string $value): void
    {
        $this->store->set($name, $this->algorythm->crypt($value));
    }

    public function get(string $name): string
    {
        return $this->algorythm->decrypt($this->store->get($name));
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