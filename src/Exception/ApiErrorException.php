<?php

namespace Gyvex\MaakEenFactuur\Exception;

use Exception;
use Illuminate\Http\Client\Response;

class ApiErrorException extends Exception
{
    public Response $response;

    public string $errorMessage;

    public function __construct(?Response $response = null)
    {
        $this->response = $response;
        $this->errorMessage = $this->getErrorMessage();

        parent::__construct($this->errorMessage, $this->response->status());
    }

    public function getErrorMessage(): string
    {
        return json_decode($this->response->body())['error']['message'];
    }
}
