<?php

declare(strict_types=1);


namespace TutuBot\Helper;


use TutuBot\TelegramType\Message;

class EmojiCodeOfCountryName
{
    protected $countryName;

    public function __construct(Message $message)
    {
        $this->countryName = (string)$message->getText();
    }

    public function printCode(): ?string
    {
        return @\constant('Spatie\Emoji\Emoji::CHARACTER_FLAG_FOR_' . $this->prepareName($this->countryName));

    }

    protected function prepareName(string $country): string
    {
        return \strtoupper(\str_replace(' ', '_', $country));
    }
}