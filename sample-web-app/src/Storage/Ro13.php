<?php
namespace App\Storage;

class Ro13 implements CryptoAlgorithm
{
    public function crypt(string $string): string
    {
        return str_rot13($string);
    }

    public function decrypt(string $string): string
    {
        return str_rot13($string);
    }

}