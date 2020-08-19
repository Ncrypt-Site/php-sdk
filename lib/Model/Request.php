<?php

namespace NCrypt\Client\Model;

class Request
{
    private $secureNote;

    private $noteRequest;

    /**
     * @return mixed
     */
    public function getSecureNote(): SecureNote
    {
        return $this->secureNote;
    }

    /**
     * @param SecureNote $secureNote
     */
    public function setSecureNote(SecureNote $secureNote): void
    {
        $this->secureNote = $secureNote;
    }

    /**
     * @return CreateNoteRequest
     */
    public function getNoteRequest(): CreateNoteRequest
    {
        return $this->noteRequest;
    }

    /**
     * @param CreateNoteRequest $noteRequest
     */
    public function setNoteRequest(CreateNoteRequest $noteRequest): void
    {
        $this->noteRequest = $noteRequest;
    }

}
