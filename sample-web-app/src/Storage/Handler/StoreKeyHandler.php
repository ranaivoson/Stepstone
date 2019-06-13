<?php
namespace App\Storage\Handler;

use App\Storage\StorageInterface;
use App\Storage\StoreKey;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class StoreKeyHandler implements MessageHandlerInterface
{
    /**
     * @var StorageInterface
     */
    private $store;

    /**
     * StoreKeyHandler constructor.
     * @param StorageInterface $store
     */
    public function __construct(StorageInterface $store)
    {
        $this->store = $store;
    }

    public function __invoke(StoreKey $storeKey)
    {
        $this->store->set($storeKey->getKey(), $storeKey->getValue());
    }
}