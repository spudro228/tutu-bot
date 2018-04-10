<?php

declare(strict_types=1);


namespace TutuBot\TelegramType;

use \Weasel\JsonMarshaller\Config\DoctrineAnnotations\JsonProperty;

class APIResponse
{
//Ok          bool                `json:"ok"`
//Result      json.RawMessage     `json:"result"`
//ErrorCode   int                 `json:"error_code"`
//Description string              `json:"description"`
//Parameters *ResponseParameters `json:"parameters"`

    /**
     * @var bool
     */
    protected $ok;

    /**
     * @var array|Update[]
     */
    protected $result;

    /**
     * @var int
     */
    protected $errorCode;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var array
     */
    protected $parameters;

    public function __construct()
    {
    }

    /**
     * @return bool
     */
    public function getOk(): bool
    {
        return $this->ok;
    }

    /**
     * @JsonProperty(name="ok", type="bool")
     * @param int $ok
     * @return APIResponse
     */
    public function setOk(int $ok): self
    {
        $this->ok = $ok;

        return $this;
    }

    /**
     * @return array|Update[]
     */
    public function getResult(): array
    {
        return $this->result;
    }

    /**
     * @JsonProperty(name="result", type="TutuBot\TelegramType\Update[]")
     * @param array|Update[] $result
     * @return APIResponse
     */
    public function setResult($result): self
    {
        $this->result = $result;

        return $this;
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

    /**
     * @JsonProperty(name="error_code", type="int")
     * @param int $errorCode
     * @return APIResponse
     */
    public function setErrorCode(int $errorCode): self
    {
        $this->errorCode = $errorCode;

        return $this;
    }

    /**
     * @JsonProperty(name="description", type="string")
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return APIResponse
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @JsonProperty(name="parameters", type="array")
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     * @return APIResponse
     */
    public function setParameters(array $parameters): self
    {
        $this->parameters = $parameters;

        return $this;
    }
}
