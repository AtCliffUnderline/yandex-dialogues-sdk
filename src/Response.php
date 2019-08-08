<?php
declare(strict_types=1);

namespace YaDialogues;


use TextNotProvidedException;
use YaDialogues\Response\Button;

class Response extends Button
{
    private $dialogue;
    private $text;
    private $tts;
    private $isEndSession;

    public function __construct(Dialogue $dialogue)
    {
        $this->dialogue = $dialogue;
    }

    /**
     * Создает массив, который необходимо отдать в качестве ответа Алисе
     * @return array
     * @throws TextNotProvidedException
     */
    public function buildResponse()
    {
        if(!$this->text) {
            throw new TextNotProvidedException();
        }
        return [
            'response' => [
                'text' => $this->text,
                'tts' => $this->tts,
                'buttons' => $this->buttons
            ],
            'end_session' => $this->isEndSession ?? false,
            'session' => [
                'session_id' => $this->dialogue->getRequest()->getSession()->getSessionId(),
                'message_id' => $this->dialogue->getRequest()->getSession()->getMessageId(),
                'user_id' => $this->dialogue->getRequest()->getSession()->getMessageId(),
            ],
            'version' => $this->dialogue->getRequest()->getVersion()
        ];
    }

    /**
     * Добавить текст ответа
     *
     * @param string $text
     * @return $this
     */
    public function setText(string $text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Добавить текст, который будет проговорен
     *
     * @param string $tts
     * @return Response
     */
    public function setTts(string $tts)
    {
        $this->tts = $tts;

        return $this;
    }

    /**
     * Установить флаг сессии
     *
     * @param bool $isEndSession
     * @return Response
     */
    public function setIsEndSession(bool $isEndSession)
    {
        $this->isEndSession = $isEndSession;

        return $this;
    }

    /**
     * @return Dialogue
     */
    public function getDialogue(): Dialogue
    {
        return $this->dialogue;
    }
}