<?php

namespace NCrypt\Client;

use NCrypt\Client\Library\Crypto\AESCrypto;
use NCrypt\Client\Model\SecureNote;
use PHPUnit\Framework\TestCase;

class AESCryptoTest extends TestCase
{

    public function testReturnTypeValidatorForSecureNoteRequest()
    {
        $crypto = new AESCrypto();
        $secureNoteResult = $crypto->secureNoteRequest("this is a test note");
        $this->assertNotNull($secureNoteResult);
    }

    public function testIvAndKeyLengthInSecureNoteRequest()
    {
        $crypto = new AESCrypto();
        $secureNoteResult = $crypto->secureNoteRequest("this is a test note");

        $lengthOfIv = strlen($secureNoteResult->getIv());
        $this->assertEquals(16, $lengthOfIv);

        $lengthOfKey = strlen($secureNoteResult->getKey());
        $this->assertEquals(44, $lengthOfKey);

    }


}
