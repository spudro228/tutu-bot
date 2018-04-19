<?php

require '../vendor/autoload.php';
require 'config.php';

\putenv('HTTPS_PROXY=' . HTTPS_PROXY);

use Weasel\WeaselDoctrineAnnotationDrivenFactory;
use TutuBot\Helper\EmojiCodeOfCountryName;
use TutuBot\TelegramSenderConfiguration\MessageConfig;
use TutuBot\JsonMarshaller\Type\RawType;

$client = new Amp\Artax\DefaultClient();

$factory = new WeaselDoctrineAnnotationDrivenFactory();
$mapper = $factory->getJsonMapperInstance();
$mapper->registerJsonType('raw', new RawType()); // register custom type for marshaling

$bot = new \TutuBot\BotAPI($client, $mapper);

\Amp\Loop::run(function () use ($bot) {
    while (true) {
        /** @var \TutuBot\TelegramType\Update[] $updates */
        while ($updates = yield $bot->getUpdates()) {
            foreach ($updates as $update) {
                //handle update
                $bot->send(
                    new MessageConfig(
                        (new EmojiCodeOfCountryName($update->getMessage()))->printCode() ?? 'Country not exist',
                        $update->getMessage()->getFrom()->getId()
                    )
                );
            }
            sleep(1 / 50);
        }
    }
});
