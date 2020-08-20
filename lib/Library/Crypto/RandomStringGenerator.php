<?php

declare(strict_types=1);

namespace NCrypt\Client\Library\Crypto;

use Exception;

class RandomStringGenerator
{
    public function generateRandomString(int $length): ?string
    {
        try {
            return random_bytes($length);
        } catch (Exception $e) {
            return null;
        }
    }
}
