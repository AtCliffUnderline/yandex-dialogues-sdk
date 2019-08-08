<?php
declare(strict_types=1);

namespace YaDialogues;


class Response
{
    private $dialogue;
    private $text;
    private $tts;
    private $buttons;
    private $isEndSession;

    public function __construct(Dialogue $dialogue)
    {
        $this->dialogue = $dialogue;
    }

    public function buildResponse()
    {
        return [
            'response' => [
                'text' => $this->text,
                'tts' => $this->tts,
                'buttons' => $this->buttons
            ],
            'end_session' => $this->isEndSession,
            'session' => [
                'session_id' => $this->dialogue->getRequest()->getSession()->getSessionId(),
                'message_id' => $this->dialogue->getRequest()->getSession()->getMessageId(),
                'user_id' => $this->dialogue->getRequest()->getSession()->getMessageId(),
            ],
            'version' => $this->dialogue->getRequest()->getVersion()
        ];
    }

    public function addButton(string $title, string $payload, string $url, bool $hide)
    {
        $this->buttons[] = [
            'title' => $title,
            'payload' => $payload,
            'url' => $url,
            'hide' => $hide
        ];

        return $this;
    }

    public function setText(string $text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @param string $tts
     * @return Response
     */
    public function setTts(string $tts)
    {
        $this->tts = $tts;

        return $this;
    }

    /**
     * @param bool $isEndSession
     * @return Response
     */
    public function setIsEndSession(bool $isEndSession)
    {
        $this->isEndSession = $isEndSession;

        return $this;
    }
}