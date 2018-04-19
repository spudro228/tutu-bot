<?php

declare(strict_types=1);

namespace TutuBot\TelegramType;

use Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonProperty;

class Update
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var Message
     */
    protected $message;

    /**
     * @var Message
     */
    protected $editedMessage;

    /**
     * @var array|Message
     */
    protected $channelPost;

    /**
     * @var array|Message
     */
    protected $editedChannelPost;

    /**
     * @var InlineQuery
     */
    protected $inlineQuery;

    /**
     * @var ChosenInlineResult
     */
    protected $chosenInlineResult;

    /**
     * @var CallbackQuery
     */
    protected $callbackQuery;

    /**
     * @var ShippingQuery
     */
    protected $shippingQuery;

    /**
     * @var PreCheckoutQuery
     */
    protected $preCheckoutQuery;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @JsonProperty(name="update_id", type="int")
     * @param int $id
     * @return Update
     */
    public function setId(int $id): Update
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Message
     */
    public function getMessage(): Message
    {
        return $this->message ?? $this->editedMessage;
    }

    /**
     * @JsonProperty(name="message", type="TutuBot\TelegramType\Message")
     * @param array|Message $message
     * @return Update
     */
    public function setMessage($message): Update
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return array|Message
     */
    public function getEditedMessage()
    {
        return $this->editedMessage;
    }

    /**
     * @JsonProperty(name="edited_message", type="TutuBot\TelegramType\Message")
     * @param array|Message $editedMessage
     * @return Update
     */
    public function setEditedMessage($editedMessage): Update
    {
        $this->editedMessage = $editedMessage;
        return $this;
    }

    /**
     * @return array|Message
     */
    public function getChannelPost()
    {
        return $this->channelPost;
    }

    /**
     * @JsonProperty(name="channel_post", type="TutuBot\TelegramType\Message")
     * @param array|Message $channelPost
     * @return Update
     */
    public function setChannelPost($channelPost): Update
    {
        $this->channelPost = $channelPost;
        return $this;
    }

    /**
     * @return array|Message
     */
    public function getEditedChannelPost()
    {
        return $this->editedChannelPost;
    }

    /**
     * @JsonProperty(name="edited_channel_post", type="TutuBot\TelegramType\Message")
     * @param array|Message $editedChannelPost
     * @return Update
     */
    public function setEditedChannelPost($editedChannelPost): Update
    {
        $this->editedChannelPost = $editedChannelPost;
        return $this;
    }

    /**
     * @return InlineQuery
     */
    public function getInlineQuery(): InlineQuery
    {
        return $this->inlineQuery;
    }

    /**
     * @param InlineQuery $inlineQuery
     * @return Update
     */
    public function setInlineQuery(InlineQuery $inlineQuery): Update
    {
        $this->inlineQuery = $inlineQuery;
        return $this;
    }

    /**
     * @return ChosenInlineResult
     */
    public function getChosenInlineResult(): ChosenInlineResult
    {
        return $this->chosenInlineResult;
    }

    /**
     * @param ChosenInlineResult $chosenInlineResult
     * @return Update
     */
    public function setChosenInlineResult(ChosenInlineResult $chosenInlineResult): Update
    {
        $this->chosenInlineResult = $chosenInlineResult;
        return $this;
    }

    /**
     * @return CallbackQuery
     */
    public function getCallbackQuery(): CallbackQuery
    {
        return $this->callbackQuery;
    }

    /**
     * @param CallbackQuery $callbackQuery
     * @return Update
     */
    public function setCallbackQuery(CallbackQuery $callbackQuery): Update
    {
        $this->callbackQuery = $callbackQuery;
        return $this;
    }

    /**
     * @return ShippingQuery
     */
    public function getShippingQuery(): ShippingQuery
    {
        return $this->shippingQuery;
    }

    /**
     * @param ShippingQuery $shippingQuery
     * @return Update
     */
    public function setShippingQuery(ShippingQuery $shippingQuery): Update
    {
        $this->shippingQuery = $shippingQuery;
        return $this;
    }

    /**
     * @return PreCheckoutQuery
     */
    public function getPreCheckoutQuery(): PreCheckoutQuery
    {
        return $this->preCheckoutQuery;
    }

    /**
     * @param PreCheckoutQuery $preCheckoutQuery
     * @return Update
     */
    public function setPreCheckoutQuery(PreCheckoutQuery $preCheckoutQuery): Update
    {
        $this->preCheckoutQuery = $preCheckoutQuery;
        return $this;
    }
}
