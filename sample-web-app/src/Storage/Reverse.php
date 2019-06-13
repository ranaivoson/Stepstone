<?php
namespace App\Storage;

class Reverse implements CryptoAlgorithm
{
    public function crypt(string $string): string
    {
        return strrev($string);
    }

    public function decrypt(string $string): string
    {
        return strrev($string);
    }

}