<?php

declare(strict_types=1);


namespace TutuBot\TelegramSenderConfiguration;


use Purl\Url;

interface SendableInterface
{
    public function getValues(): Url;

    public function getMethod(): string;
}