<?php
declare(strict_types=1);

namespace YaDialogues;


use DateTimeZone;
use YaDialogues\Request\{Body, Meta, Session};

class Request
{
    /**
     * @var Meta
     */
    private $meta;

    /**
     * @var Body
     */
    private $body;

    /**
     * @var Session
     */
    private $session;

    /**
     * @var string
     */
    private $version;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->meta = new Meta();
        $this->body = new Body();
        $this->session = new Session();
    }

    /**
     * @param array $request
     * @return Request
     */
    public function initFromArray(array $request): Request
    {
        $this->meta
            ->setClientId($request['meta']['client_id'])
            ->setLocale($request['meta']['locale'])
            ->setTimezone(new DateTimeZone($request['meta']['timezone']));

        $nlu = new Body\NLU();
        $nlu->setEntities($request['request']['nlu']['entities'])
            ->setTokens($request['request']['nlu']['tokens']);

        $this->body
            ->setCommand($request['request']['command'])
            ->setNlu($nlu)
            ->setPayload($request['request']['payload'] ?? '');

        $this->session
            ->setIsNew($request['session']['new'])
            ->setMessageId($request['session']['message_id'])
            ->setSessionId($request['session']['session_id'])
            ->setSkillId($request['session']['skill_id'])
            ->setUserId($request['session']['user_id']);

        $this->version = $request['version'];

        return $this;
    }

    /**
     * @return Meta
     */
    public function getMeta(): Meta
    {
        return $this->meta;
    }

    /**
     * @return Body
     */
    public function getBody(): Body
    {
        return $this->body;
    }

    /**
     * @return Session
     */
    public function getSession(): Session
    {
        return $this->session;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }
}
