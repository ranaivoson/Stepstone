<?php
namespace App\Storage;

interface StorageInterface
{
    public function set(string $name, string $value) :void ;
    public function get(string $name) :string ;
    public function getAll();
    public function delete(string $name) :void ;
}