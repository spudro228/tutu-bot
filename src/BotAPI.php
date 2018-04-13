<?php

declare(strict_types=1);


namespace TutuBot;


use Amp\Artax\Client;
use Amp\Artax\Response;
use Amp\Promise;
use TutuBot\TelegramSenderConfiguration\SendableInterface;
use TutuBot\TelegramType\APIResponse;
use TutuBot\TelegramType\Update;
use Weasel\JsonMarshaller\JsonMapper;
use function \Amp\call;

class BotAPI
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var JsonMapper
     */
    protected $mapper;

    /**
     * @var int
     */
    protected $lastId;

    public function __construct(Client $client, JsonMapper $mapper)
    {
        $this->client = $client;
        $this->mapper = $mapper;
        $this->lastId = 0;
    }

    public function getUpdates(): Promise
    {
        return call(function () {
            try {
                $url = GET_UPDATES_METHOD . ($this->lastId ? '?offset=' . ($this->lastId + 1) : null);
                \var_dump($url);
                /** @var Response $response */
                $response = yield $this->client->request($url);
                \var_dump(yield $response->getBody());
                /**
                 * @var APIResponse $apiResponse
                 */
                $apiResponse = $this->mapper->readString(yield $response->getBody(), APIResponse::class);

                /**
                 * Костыль.
                 * Телеграм отпраляет в поле result как еденичное значение так и МАССИВ значений,
                 * что ломает маршалинг нахуй, т.к нельзя указать тип (единичное значение| массив значений) Update|Updates[]
                 */
                $result = \json_decode($apiResponse->getResult());


                if (\is_array($result)) {
                    /**
                     * @var Update[] $updates
                     */
                    $updates = \array_map(function ($item) {
                        return $this->mapper->readString(\json_encode($item), Update::class);
                    }, $result);

                    $this->lastId = $this->getLastUpdateId($updates);

                    return $updates;
                }
                /**
                 * @var Update[] $update
                 */
                $update = [$this->mapper->readString($result, Update::class)];
                $this->lastId = $this->getLastUpdateId($update);
                return $update;
            } catch (\InvalidArgumentException $exception) {
                //@todo тут чет придумать надо получе
                print $exception->getMessage() . PHP_EOL;
                return [];
            }
        });
    }

//    public function sendMessage($chatId, $text, $reply_to_message_id = null): Promise
//    {
//        return call(function () use ($chatId, $text, $reply_to_message_id) {
//
//            /** @var Response $response */
//            $response = yield $this->client->request(SEND_MESSAGE . '?chat_id=' . $chatId . '&text=' . $text . '&reply_to_message_id=' . $reply_to_message_id);
//
//            return yield $response->getBody();
//        });
//    }


    /**
     * @param Update[] $updates
     * @return int
     */
    protected function getLastUpdateId(array $updates): int
    {
        return ($_ = $updates[\count($updates) - 1] ?? null) ? $_->getId() : 0;
    }

    /**
     * @todo выделить makeRequest, который берет параметры для запроса , делает запрос и возвращать Message или APIRequest чтобы определить отрправлено ли сообщение
     * @param SendableInterface $sendable
     * @return string
     */
    public function send(SendableInterface $sendable)
    {
        $v = $sendable->getValues();
        $v->join(TELEGRAM_API_PATH . '/' . $sendable->getMethod());

        \var_dump($v->__toString());
        $this->client->request($v->__toString())->onResolve(function ($_, $data) {
//            var_dump($data);
        });
    }
}
