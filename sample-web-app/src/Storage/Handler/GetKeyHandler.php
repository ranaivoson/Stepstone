<?php
/**
 * Created by PhpStorm.
 * User: Ranain01
 * Date: 06/02/2019
 * Time: 16:29
 */

namespace App\Storage\Handler;


use App\Storage\GetValue;
use App\Storage\StorageInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class GetKeyHandler implements MessageHandlerInterface
{
    /**
     * @var StorageInterface
     */
    private $store;

    public function __invoke(GetValue $getValue)
    {
        $this->store->get($getValue->getKey());
    }
}