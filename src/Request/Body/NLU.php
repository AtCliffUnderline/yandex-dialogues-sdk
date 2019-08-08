<?php
declare(strict_types=1);

namespace YaDialogues\Request\Body;


class NLU
{
    /**
     * @var ?array Сущности, опознанные Алисой
     */
    private $entities;

    /**
     * @var ?array Токены (набор слов)
     */
    private $tokens;

    /**
     * @return array
     */
    public function getEntities(): ?array
    {
        return $this->entities;
    }

    /**
     * @return array
     */
    public function getTokens(): ?array
    {
        return $this->tokens;
    }

    /**
     * @param array $entities
     * @return NLU
     */
    public function setEntities(?array $entities): NLU
    {
        $this->entities = $entities;
        return $this;
    }

    /**
     * @param array $tokens
     * @return NLU
     */
    public function setTokens(?array $tokens): NLU
    {
        $this->tokens = $tokens;
        return $this;
    }
}