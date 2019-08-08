<?php
declare(strict_types=1);

namespace YaDialogues\Request;


use YaDialogues\Request\Body\NLU;

class Body
{
    /** @var string Текст запроса */
    private $command;

    /** @var ?string JSON, полученный с нажатой кнопкой от обработчика навыка (в ответе на предыдущий запрос) */
    private $payload;

    /** @var NLU Именованные сущности в запросах */
    private $nlu;

    /**
     * @return string
     */
    public function getCommand(): string
    {
        return $this->command;
    }


    /**
     * @return string
     */
    public function getPayload(): ?string
    {
        return $this->payload;
    }

    /**
     * @return NLU
     */
    public function getNlu(): NLU
    {
        return $this->nlu;
    }

    /**
     * @param string $command
     * @return Body
     */
    public function setCommand(string $command): Body
    {
        $this->command = $command;

        return $this;
    }

    /**
     * @param string $payload
     * @return Body
     */
    public function setPayload(?string $payload): Body
    {
        $this->payload = $payload;

        return $this;
    }

    /**
     * @param NLU $nlu
     * @return Body
     */
    public function setNlu(NLU $nlu): Body
    {
        $this->nlu = $nlu;

        return $this;
    }


}