<?php

namespace NCrypt\Client\Library\RequestBuilder;

use NCrypt\Client\Library\Crypto\AESCrypto;
use NCrypt\Client\Library\Crypto\RandomStringGenerator;
use NCrypt\Client\Model\CreateNoteRequest;
use NCrypt\Client\Model\Request;

class RequestBuilder
{
    private $crypto;


    public function __construct(?AESCrypto $crypto = null)
    {
        $this->crypto = $crypto ?? new AESCrypto(new RandomStringGenerator());
    }

    public function prepareSecureNoteRequest(
        string $note,
        int $selfDestruct,
        bool $destructAfterOpening
    ): ?Request {
        $secureNote = $this->crypto->secureNoteRequest($note);
        if (!$secureNote) {
            return null;
        }

        $noteHash = hash('sha256', $secureNote->getMessage());
        $message = base64_encode($secureNote->getMessage())
            . ','
            . $noteHash
            . ','
            . base64_encode($secureNote->getIv());
        $messageHash = hash('sha256', $message);

        $message .= ',' . $messageHash;

        $request = new Request();

        $request->setNoteRequest(new CreateNoteRequest([
            'message' => $message,
            'self_destruct' => $selfDestruct,
            'destruct_after_opening' => $destructAfterOpening
        ]));
        $request->setSecureNote($secureNote);

        return $request;
    }
}
