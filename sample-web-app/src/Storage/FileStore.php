<?php
namespace App\Storage;

use Gaufrette\Adapter\Local as LocalAdapter;
use Gaufrette\Filesystem;

class FileStore extends Store
{

    public function __construct(string $path = '/app/var/store')
    {
        $adapter = new LocalAdapter($path);
        $fileSystem = new Filesystem($adapter);

        parent::__construct($fileSystem, $path);
    }
}