<?php

namespace YaDialogues\Response;


class Image extends Button
{
    /**
     * @var string Заголовок изображения
     */
    private $title;

    /**
     * @var string Описание изображения
     */
    private $description;

    /**
     * @var string Идентификатор изображения
     */
    private $imageId;

    public function __construct(string $imageId)
    {
        $this->imageId = $imageId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $title
     * @return Image
     */
    public function setTitle(string $title): Image
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $description
     * @return Image
     */
    public function setDescription(string $description): Image
    {
        $this->description = $description;

        return $this;
    }
}