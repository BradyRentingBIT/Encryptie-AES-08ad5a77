<?php
echo "Establishing secure connection to jarvis.bit-academy.nl (167.71.64.195)" . PHP_EOL;
sleep(3);
echo "Validating request..." . PHP_EOL;
sleep(1.5);
echo "Scanning fingerprint..." . PHP_EOL;
sleep(3);
echo PHP_EOL . "\033[01;32mAuthentication completed \033[0m" . PHP_EOL . PHP_EOL;

$plaintext = readline("What message do you wish to encrypt? ");
$key = readline("Enter passphrase for key '/home/jarvis/.ssh/id_rsa': ");

echo PHP_EOL . "Encrypting message.." . PHP_EOL;
sleep(2);

$cipher = "aes-128-gcm";
if (in_array($cipher, openssl_get_cipher_methods()))
{
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext = openssl_encrypt($plaintext, $cipher, $key, $options=0, $iv, $tag);
    //store $cipher, $iv, and $tag for decryption later
    $original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, $options=0, $iv, $tag);
    echo "Successfully encrypted message '" . $original_plaintext . "' to '" . $ciphertext . "'" . PHP_EOL;
}
