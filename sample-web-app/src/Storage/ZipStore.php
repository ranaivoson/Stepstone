<?php
namespace App\Storage;

use Gaufrette\Adapter\Zip as ZipAdapter;
use Gaufrette\Filesystem;

class ZipStore extends Store
{

    public function __construct(string $path = '/app/var/zip/file')
    {
        $adapter = new ZipAdapter($path);
        $filesystem = new Filesystem($adapter);

        parent::__construct($filesystem, $path);
    }
}