<?php


namespace YaDialogues\Response;



class Button
{
    /**
     * @var array
     */
    protected $buttons;

    /**
     * Добавляет кнопку к ответу или изображению
     *
     * @param string $title
     * @param string $payload
     * @param string $url
     * @param bool $hide
     * @return $this
     */
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
}