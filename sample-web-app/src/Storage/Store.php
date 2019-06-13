<?php
namespace App\Storage;

use Gaufrette\Filesystem;

class Store implements StorageInterface
{
    private $path;
    private $fileSystem;

    public function __construct(Filesystem $fileSystem, string $path)
    {
        $this->path = $path;
        $this->fileSystem = $fileSystem;
    }

    public function get(string $name): string
    {
        $value = $this->fileSystem->read($this->path.$name);
        return $value;
    }

    public function set(string $name, string $value): void
    {
        $this->fileSystem->write($this->path.$name, $value, true);
    }

    public function getAll()
    {

    }

    public function delete(string $name): void
    {
        $this->fileSystem->delete($this->path.$name);
    }
}