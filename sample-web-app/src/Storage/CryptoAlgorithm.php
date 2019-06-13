<?php
namespace App\Storage;

interface CryptoAlgorithm
{
    public function crypt(string $string):string ;
    public function decrypt(string $string):string ;
}