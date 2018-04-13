<?php

declare(strict_types=1);


namespace TutuBot\TelegramSenderConfiguration;


use Purl\Url;

class MessageConfig extends Config implements SendableInterface
{
    /**
     * @var string
     */
    protected $text;

    //todo disable_web_page_preview

    public function __construct(string $text, int $chatId, int $replyToMessageId = null)
    {
        $this->text = $text;
        $this->chatId = $chatId;
        $this->replyToMessageId = $replyToMessageId;
    }

    public function getMethod(): string
    {
        return 'sendMessage';
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return MessageConfig
     */
    public function setText(string $text): MessageConfig
    {
        $this->text = $text;
        return $this;
    }

    public function getValues(): Url
    {
        $url = parent::getValues();
        $url->query->set('text', $this->text);

        return $url;
    }

}