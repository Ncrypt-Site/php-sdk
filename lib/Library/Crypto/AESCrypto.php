<?php

namespace NCrypt\Client\Library\Crypto;

use NCrypt\Client\Model\SecureNote;

class AESCrypto
{
    private const AES_ALGORITHM = 'aes-256-ctr';

    private $randomGenerator;

    // this should be an interface, I don't know why I put it this way.
    public function __construct(?RandomStringGenerator $randomGenerator = null)
    {
        $this->randomGenerator = $randomGenerator ?? new RandomStringGenerator();
    }

    public function secureNoteRequest(string $note): ?SecureNote
    {
        $key = $this->randomGenerator->generateRandomString(32);
        $iv = $this->randomGenerator->generateRandomString(16);
        $encryptedMessage = $this->encryptMessage($note, $key, $iv);

        if (!$encryptedMessage) {
            return null;
        }

        $secureNote = new SecureNote();
        $secureNote->setMessage($encryptedMessage);
        $secureNote->setKey($key);
        $secureNote->setIv($iv);

        return $secureNote;
    }

    private function encryptMessage(string $message, string $key, string $iv): ?string
    {
        $encryptedMessage = openssl_encrypt($message, self::AES_ALGORITHM, $key, OPENSSL_RAW_DATA, $iv);
        return $encryptedMessage ?? null;
    }
}
