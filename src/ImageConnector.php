<?php


namespace YaDialogues;


use GuzzleHttp\Client;
use NoOAuthTokenProvidedException;
use YaDialogues\Response\Image;

class ImageConnector
{
    /**
     * @var string Эндпойнт Яндекс Диалогов
     */
    private $dialoguesEndpoint = 'https://dialogs.yandex.net/api/v1/skills/';

    /**
     * @var Response
     */
    private $response;

    /**
     * @var Client
     */
    private $client;

    /**
     * ImageConnector constructor.
     * @param Response $response
     * @throws NoOAuthTokenProvidedException
     */
    public function __construct(Response $response)
    {
        $this->response = $response;
        $this->dialoguesEndpoint .= $response->getDialogue()->getRequest()->getSession()->getSkillId() . '/images';
        $this->client = $this->createClient();
    }

    /**
     * Найти изображение или загрузить по URL
     *
     * @param string $url
     * @return Image
     */
    public function uploadOrGetByURL(string $url): Image
    {
        $uploadedImages = $this->getUploadedImages();

        foreach($uploadedImages as $image) {
            if($image['origUrl'] == $url) return new Image($image['id']);
        }

        $response = $this->client->post($this->dialoguesEndpoint, [
            'json' => [
                'url' => $url
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return new Image($result['image']['id']);
    }

    /**
     * Получить список загруженных изображений
     *
     * @return Image
     */
    public function getUploadedImages(): array
    {
        $response = $this->client->get($this->dialoguesEndpoint);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['images'];
    }

    /**
     * Создать GuzzleHTTP клиент
     *
     * @return Client
     * @throws NoOAuthTokenProvidedException
     */
    private function createClient()
    {
        if (!$OAuthToken = $this->response->getDialogue()->getOAuthToken()) {
            throw new NoOAuthTokenProvidedException();
        }

        return new Client([
            'headers' => [
                'Authorization' => 'OAuth ' . $OAuthToken
            ]
        ]);
    }
}