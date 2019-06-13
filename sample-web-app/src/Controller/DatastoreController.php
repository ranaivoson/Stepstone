<?php

namespace App\Controller;

use App\Storage\StorageInterface;
use App\Storage\StoreKey;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DatastoreController
 * @package App\Controller
 *
 * @Route("/datastore")
 */
class DatastoreController extends AbstractController
{
    /**
     * @var StorageInterface
     */
    private $store;

    public function __construct(StorageInterface $store)
    {
        $this->store = $store;
    }

    /**
     * @Route("/{key}", name="get_datastore", methods={"GET"})
     */
    public function getDatastore($key)
    {
        $value = $this->store->get($key);
        if (is_null($value)) {
            throw new NotFoundHttpException();
        }
        return new JsonResponse($value);
    }

    /**
     * @Route("/", name="get_datastores", methods={"GET"})
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getDatastores(Request $request){
        $values = $this->store->getAll();

        return new JsonResponse($values);
    }

    /**
     * @Route("/{key}", name="put_datastore", methods={"PUT"})
     *
     * @param Request $request
     * @param $key
     * @return JsonResponse
     */
    public function putDatastore(Request $request, MessageBusInterface $bus, $key){
        $bus->dispatch(new StoreKey($key, $request->get('value')));
        return new JsonResponse("STORED!");
    }

    /**
     *
     * @Route("/{key}", name="delete_datastore", methods={"DELETE"})
     * @param $key
     * @return JsonResponse
     */
    public function DeleteDatastore($key){
        $this->store->delete($key);

        return new JsonResponse("DELETED");
    }

}
