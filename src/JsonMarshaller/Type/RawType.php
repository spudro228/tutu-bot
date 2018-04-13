<?php

declare(strict_types=1);


namespace TutuBot\JsonMarshaller\Type;


use Weasel\JsonMarshaller\JsonMapper;
use Weasel\JsonMarshaller\Types\JsonType;

class RawType implements JsonType
{

    /**
     * @todo КАСТЫЛЬ ПИЗДОС АААА
     * Deserialize something to its PHP type.
     * @param mixed $value
     * @param \Weasel\JsonMarshaller\JsonMapper $mapper
     * @param bool $strict Apply strict checking of input values.
     * @return mixed
     */
    public function decodeValue($value, JsonMapper $mapper, $strict)
    {
        return \json_encode($value);
    }

    /**
     * Serialize a PHP value to Json.
     * @param $value
     * @param \Weasel\JsonMarshaller\JsonMapper $mapper
     * @return string
     */
    public function encodeValue($value, JsonMapper $mapper)
    {
        return $value;
    }
}