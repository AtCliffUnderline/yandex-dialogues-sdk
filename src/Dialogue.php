<?php
declare(strict_types=1);

namespace YaDialogues;


class Dialogue
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var Response
     */
    private $response;

    /**
     * @var string OAuth Token для Яндекс Диалогов
     */
    private $OAuthToken;

    public function createDialogue(array $request)
    {
        $this->request = new Request();
        $this->request->initFromArray($request);
    }

    public function createResponse(): Response
    {
        $this->response = new Response($this);

        return $this->response;
    }

    public function setOAuthToken(string $token)
    {
        $this->OAuthToken = $token;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }
}