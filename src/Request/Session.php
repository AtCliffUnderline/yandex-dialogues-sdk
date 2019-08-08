<?php
declare(strict_types=1);

namespace YaDialogues\Request;


class Session
{
    /**
     * @var bool Признак новой сессии. Возможные значения:
     * true — пользователь начал новый разговор с навыком;
     * false — запрос отправлен в рамках уже начатого разговора.
     */
    private $isNew;

    /**
     * @var string Уникальный идентификатор сессии, 64 байта.
     */
    private $sessionId;

    /**
     * @var int Идентификатор сообщения в рамках сессии. Инкрементируется с каждым следующим запросом.
     */
    private $messageId;

    /**
     * @var string Идентификатор вызываемого навыка.
     */
    private $skillId;

    /**
     * @var string Обфусцированный идентификатор пользователя.
     */
    private $userId;

    /**
     * @return bool
     */
    public function isNew(): bool
    {
        return $this->isNew;
    }

    /**
     * @return string
     */
    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->messageId;
    }

    /**
     * @return string
     */
    public function getSkillId(): string
    {
        return $this->skillId;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param bool $isNew
     * @return Session
     */
    public function setIsNew(bool $isNew): Session
    {
        $this->isNew = $isNew;
        return $this;
    }

    /**
     * @param string $sessionId
     * @return Session
     */
    public function setSessionId(string $sessionId): Session
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @param int $messageId
     * @return Session
     */
    public function setMessageId(int $messageId): Session
    {
        $this->messageId = $messageId;
        return $this;
    }

    /**
     * @param string $skillId
     * @return Session
     */
    public function setSkillId(string $skillId): Session
    {
        $this->skillId = $skillId;
        return $this;
    }

    /**
     * @param string $userId
     * @return Session
     */
    public function setUserId(string $userId): Session
    {
        $this->userId = $userId;
        return $this;
    }
}