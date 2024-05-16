<?php

namespace Gyvex\MaakEenFactuur\Exception;

use Exception;
use Illuminate\Http\Response;

class ApiErrorException extends Exception
{
    public Response $response;

    public string $errorMessage;

    public function __construct(?Response $response = null)
    {
        $this->response = $response;
        $this->errorMessage = $this->getErrorMessage();

        parent::__construct($this->errorMessage, $this->response->getStatusCode());
    }

    public function getErrorMessage(): string
    {
        return json_decode($this->response->content())['error']['message'];
    }
}
