<?php

require '../vendor/autoload.php';

use Amp\Artax\Request;
use Amp\Artax\Response;
use TutuBot\TelegramType\APIResponse;
use Weasel\WeaselDoctrineAnnotationDrivenFactory;

$client = new Amp\Artax\DefaultClient();
$_ = new APIResponse();
//var_dump($_);exit;
/** @var Amp\Promise $client */
const TOKEN = '432585264:AAH_6U4kCYdY-dcbcXz04TxVh80j-IgkQQo';
const PING = 'https://api.telegram.org/bot' . TOKEN . '/getMe';
const GET_MESSAGE_METHOD = 'https://api.telegram.org/bot' . TOKEN . '/getUpdates';
const SEND_MESSAGE = 'https://api.telegram.org/bot' . TOKEN . '/sendMessage';
const HTTPBIN = 'https://httpbin.org/get';

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
                $bot->sendMessage($update->getMessage()->getFrom()->getId(), "Answer!", $update->getMessage()->getId());
            }
            sleep(1);
        }
    }

//    $promise = Amp\call(function () use ($client) {
//        try {
//            // Yield control until the generator resolves
//            // and return its eventual result.
//            $response = yield $client->request("https://example.com/");
//
//            $body = yield $response->getBody();
//
//            return $body;
//        } catch (HttpException $e) {
//            // If promise resolution fails the exception is
//            // thrown back to us and we handle it as needed.
//        }
//    });
//
//    while ($_ = yield $promise){
//        var_dump($_);
//
//    }

//    while ($response = yield $client->request(GET_MESSAGE_METHOD)) {
//        /** @var APIResponse $updates */
//        while ($updates = yield handle($response, $mapper)) {
//            if ($updates->getOk()) {
//                var_dump($updates->getResult());
//                exit;
////                var_dump($updates->getResult()[0]);exit;
//                /** @var Response $res */
////                $res = yield $client->request(SEND_MESSAGE . '?chat_id=' . $updates->getResult()[0]->getMessage()->getFrom()->getId() . '&text=' . "Hello");
////                $body = yield $res->getBody();
//////                var_dump(\json_decode($body)->result);
////                \var_dump($mapper->readString(\json_encode(\json_decode($body)->result), \TutuBot\TelegramType\Message::class));
////                exit;
//            }
//
//            /** @var \TutuBot\TelegramType\Update $update */
////            foreach ($updates->getResult() as $update) {
//////                \var_dump($update);
////                $response = yield $client->request(SEND_MESSAGE . '?chat_id=' . $update->getMessage()->getFrom()->getId() . '&text=' . "Hello");
////
////            }
////            sleep(1);
//        }


//        var_dump(yield $response->getBody());

//        sleep(3);
//    }

});


function handle(Response $response, \Weasel\JsonMarshaller\JsonMapper $mapper)
{
    return Amp\call(function (\Weasel\JsonMarshaller\JsonMapper $mapper, $response) {
        $body = yield $response->getBody();
//        var_dump($body);
        return $mapper->readString($body, APIResponse::class);
    }, $mapper, $response);


}

function getUpdates()
{

}

function sendMessage(\Amp\Artax\Client $client, $chatId, $text)
{
    Amp\call(function () use ($client, $chatId, $text) {

        /** @var Response $response */
        $response = yield $client->request(SEND_MESSAGE . '?chat_id=' . $chatId . '&text=' . $text);

        $body = yield $response->getBody();

        return $body;
    });
}