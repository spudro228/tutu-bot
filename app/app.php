<?php

require '../vendor/autoload.php';

use TutuBot\TelegramType\APIResponse;
use Weasel\WeaselDoctrineAnnotationDrivenFactory;

$client = new Amp\Artax\DefaultClient();
$_ = new APIResponse();
//var_dump($_);exit;
/** @var Amp\Promise $client */
const TOKEN = '432585264:AAH_6U4kCYdY-dcbcXz04TxVh80j-IgkQQo';
const PING = 'https://api.telegram.org/bot' . TOKEN . '/getMe';
const GET_MESSAGE_METHOD = 'https://api.telegram.org/bot' . TOKEN . '/getUpdates';
const HTTPBIN = 'https://httpbin.org/get';

$factory = new WeaselDoctrineAnnotationDrivenFactory();
$mapper = $factory->getJsonMapperInstance();
//$thing = $mapper->readString($json, $typeToDecodeTo);

\Amp\Loop::run(function () use ($client, $mapper) {


    while ($response = yield $client->request(GET_MESSAGE_METHOD)) {
        handle($response, $mapper);
//        var_dump($response->getStatus());
//        var_dump($response->getHeaders());
//
//// Response::getBody() returns a Message
//// See http://amphp.org/byte-stream/message
//        var_dump(yield $response->getBody());

//        sleep(1 / 30);
        sleep(1);
    }

});

function handle($response, \Weasel\JsonMarshaller\JsonMapper $mapper)
{
    Amp\asyncCall(function () use ($response, $mapper) {
//        var_dump(\json_decode(yield $response->getBody())->result[0]->message);
//        exit;
//        $thing = $mapper->readString(yield $response->getBody(), APIResponse::class);
//        var_dump($thing);
//        exit;
                var_dump(\json_decode(yield $response->getBody())->result[0]->message);

        $thing = $mapper->readString(\json_encode(\json_decode(yield $response->getBody())->result[0]->message), \TutuBot\TelegramType\Message::class);
        var_dump($thing);
        exit;
        sleep(1);
    });
}