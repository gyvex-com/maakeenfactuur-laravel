<?php

namespace Gyvex\MaakEenFactuur\Exception;

use Exception;
use Illuminate\Http\Response;

class ApiErrorException extends Exception
{
    /**
     * @var Response
     */
    public Response $response;

    /**
     * @var string
     */
    public string $errorMessage;

    /**
     * @param Response|null $response
     */
    public function __construct(Response $response = null)
    {
        $this->response = $response;
        $this->errorMessage = $this->getErrorMessage();

        parent::__construct($this->errorMessage, $this->response->getStatusCode());
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return json_decode($this->response->content())['error']['message'];
    }
}
