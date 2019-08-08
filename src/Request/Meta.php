<?php
declare(strict_types=1);

namespace YaDialogues\Request;


use DateTimeZone;

class Meta
{
    /** @var string Атрибут locale - язык*/
    private $locale;

    /** @var DateTimeZone Название часового пояса */
    private $timezone;

    /** @var string Идентификатор устройства и приложения, в котором идет разговор. */
    private $clientId;

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @return DateTimeZone
     */
    public function getTimezone(): DateTimeZone
    {
        return $this->timezone;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @param string $locale
     * @return Meta
     */
    public function setLocale(string $locale): Meta
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @param DateTimeZone $timezone
     * @return Meta
     */
    public function setTimezone(DateTimeZone $timezone): Meta
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * @param string $clientId
     * @return Meta
     */
    public function setClientId(string $clientId): Meta
    {
        $this->clientId = $clientId;

        return $this;
    }
}