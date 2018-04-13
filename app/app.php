<?php

require '../vendor/autoload.php';
require 'config.php';

use TutuBot\TelegramType\APIResponse;
use Weasel\WeaselDoctrineAnnotationDrivenFactory;

$client = new Amp\Artax\DefaultClient();
$_ = new APIResponse();

$factory = new WeaselDoctrineAnnotationDrivenFactory();
$mapper = $factory->getJsonMapperInstance();
$rawType = new \TutuBot\JsonMarshaller\Type\RawType();
$mapper->registerJsonType('raw', $rawType);

$bot = new \TutuBot\BotAPI($client, $mapper);


\Amp\Loop::run(function () use ($bot) {
    while (true) {
        /** @var \TutuBot\TelegramType\Update[] $updates */
        while ($updates = yield $bot->getUpdates()) {
            foreach ($updates as $update) {
                var_dump($update);
                $bot->send(new \TutuBot\TelegramSenderConfiguration\MessageConfig('Answser!', $update->getMessage()->getFrom()->getId()));
            }
            sleep(1);
        }
    }
});