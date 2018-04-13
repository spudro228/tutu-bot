<?php

declare(strict_types=1);


namespace TutuBot\TelegramSenderConfiguration;


use Purl\Url;

abstract class Config
{
    /**
     * @var int
     */
    protected $chatId;

    /**
     * @var null|int
     */
    protected $replyToMessageId;

    /**
     * @var null|bool
     */
    protected $disableNotification;

    //@todo reply_markup
    //@todo parse_mode

    public function getValues(): Url
    {
        //todo:  выпилить URL()
        $url = new Url(TELEGRAM_API_PATH);

        $url->query->set('chat_id', $this->chatId);

        if ($this->replyToMessageId) {
            $url->query->set('reply_to_message_id', $this->replyToMessageId);

        }
        if ($this->disableNotification) {
            $url->query->set('disable_notification', $this->disableNotification);

        }

        return $url;
    }

    /**
     * @return int
     */
    public function getChatId(): int
    {
        return $this->chatId;
    }

    /**
     * @param int $chatId
     * @return Config
     */
    public function setChatId(int $chatId): Config
    {
        $this->chatId = $chatId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getReplyToMessageId(): ?int
    {
        return $this->replyToMessageId;
    }

    /**
     * @param int|null $replyToMessageId
     * @return Config
     */
    public function setReplyToMessageId(?int $replyToMessageId): Config
    {
        $this->replyToMessageId = $replyToMessageId;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDisableNotification(): ?bool
    {
        return $this->disableNotification;
    }

    /**
     * @param bool|null $disableNotification
     * @return Config
     */
    public function setDisableNotification(?bool $disableNotification): Config
    {
        $this->disableNotification = $disableNotification;
        return $this;
    }
}