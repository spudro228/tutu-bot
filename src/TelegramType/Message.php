<?php

declare(strict_types=1);


namespace TutuBot\TelegramType;


use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonProperty;

class Message
{
    //todo: https://core.telegram.org/bots/api#message

    /**
     * @var int
     */
    protected $id;

    /**
     * @var null|string
     */
    protected $text;

    /**
     * @var null|User
     */
    protected $from;

    /**
     * @var null|int
     */
    protected $date;

    /**
     * @var Chat
     */
    protected $chat;

    /**
     * @var null|User
     */
    protected $forwardFrom;

    /**
     * @var null|Chat
     */
    protected $forwardFromChat;

    /**
     * @var null|int
     */
    protected $forwardFromMessageId;

    /**
     * @var null|string
     */
    protected $forwardSignature;

    /**
     * @var null|int
     */
    protected $forwardDate;

    /**
     * @var null|Message
     */
    protected $replyToMessage;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @JsonProperty(name="message_id", type="int")
     * @param int $id
     * @return Message
     */
    public function setId(int $id): Message
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return null|User
     */
    public function getFrom(): ?User
    {
        return $this->from;
    }

    /**
     * @JsonProperty(name="from", type="TutuBot\TelegramType\User")
     * @param null|User $from
     * @return Message
     */
    public function setFrom(?User $from): Message
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @JsonProperty(name="date", type="int")
     * @param int $date
     * @return Message
     */
    public function setDate(int $date): Message
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @JsonProperty(name="chat", type="TutuBot\TelegramType\Chat")
     * @param Chat $chat
     * @return Message
     */
    public function setChat(Chat $chat): Message
    {
        $this->chat = $chat;
        return $this;
    }

    /**
     * @return null|User
     */
    public function getForwardFrom(): ?User
    {
        return $this->forwardFrom;
    }

    /**
     * @JsonProperty(name="forward_from", type="TutuBot\TelegramType\User")
     * @param null|User $forwardFrom
     * @return Message
     */
    public function setForwardFrom(?User $forwardFrom): Message
    {
        $this->forwardFrom = $forwardFrom;
        return $this;
    }

    /**
     * @return null|Chat
     */
    public function getForwardFromChat(): ?Chat
    {
        return $this->forwardFromChat;
    }

    /**
     * @JsonProperty(name="forward_from_chat", type="TutuBot\TelegramType\Chat")
     * @param null|Chat $forwardFromChat
     * @return Message
     */
    public function setForwardFromChat(?Chat $forwardFromChat): Message
    {
        $this->forwardFromChat = $forwardFromChat;
        return $this;
    }

    /**
     * @return null|int
     */
    public function getForwardFromMessageId(): ?int
    {
        return $this->forwardFromMessageId;
    }

    /**
     * @JsonProperty(name="forward_from_message_id", type="int")
     * @param null|int $forwardFromMessageId
     * @return Message
     */
    public function setForwardFromMessageId(?int $forwardFromMessageId): Message
    {
        $this->forwardFromMessageId = $forwardFromMessageId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getForwardSignature(): ?string
    {
        return $this->forwardSignature;
    }

    /**
     * @JsonProperty(name="forward_signature", type="string")
     * @param null|string $forwardSignature
     * @return Message
     */
    public function setForwardSignature(?string $forwardSignature): Message
    {
        $this->forwardSignature = $forwardSignature;
        return $this;
    }

    /**
     * @return null|int
     */
    public function getForwardDate(): ?int
    {
        return $this->forwardDate;
    }

    /**
     * @JsonProperty(name="forward_date", type="int")
     * @param null|int $forwardDate
     * @return Message
     */
    public function setForwardDate(?int $forwardDate): Message
    {
        $this->forwardDate = $forwardDate;
        return $this;
    }

    /**
     * @return null|Message
     */
    public function getReplyToMessage(): ?Message
    {
        return $this->replyToMessage;
    }

    /**
     * @param null|Message $replyToMessage
     * @return Message
     */
    public function setReplyToMessage(?Message $replyToMessage): Message
    {
        $this->replyToMessage = $replyToMessage;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @JsonProperty(name="text", type="string")
     * @param null|string $text
     * @return Message
     */
    public function setText(?string $text): Message
    {
        $this->text = $text;
        return $this;
    }
}
