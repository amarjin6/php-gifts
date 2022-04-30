<?php
error_reporting(0);

class Cipher
{
    public function Encrypt(string $key, string $text)
    {
        return openssl_encrypt($text, "camellia-192-cbc", $key);
    }
    
    public function Decrypt(string $key, string $text)
    {
        return openssl_decrypt($text, "camellia-192-cbc", $key);
    }
}

class CryptoManager
{
    private string $key;
    
    private Cipher $cipher;
    
    
    public function __construct(string $key, Cipher $algo)
    {
        $this->key = $key;
        $this->cipher = $algo;
    }
    
    
    public function Encrypt(string $text)
    {
        return $this->cipher->Encrypt($this->key, $text);
    }
    
    public function Decrypt(string $text)
    {
        return $this->cipher->Decrypt($this->key, $text);
    }
}

$text = "TextToEncrypt";
$key = "KEY";
echo "Plain text: ", $text, "<br>", "Key: ", $key, "<br><br>";

$manager = new CryptoManager($key, new Cipher());

$encrText = $manager->Encrypt($text);
echo "Encrypted text: ", $encrText, "<br>";

$decrText = $manager->Decrypt($encrText);
echo "Decrypted text: ", $decrText, "<br>";

?>