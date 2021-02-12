<?php


namespace Core\Http;


class Response
{
    private int $status;
    private array $headers;
    /**
     * @var mixed|null
     */
    private $body;

    public function __construct(int $status = 200, array $headers = [], $body = null)
    {
        $this->status = $status;
        $this->headers = $headers;
        $this->body = $body;
    }

    public function send()
    {
        // sends status code
        http_response_code($this->status);
        // sends headers
        foreach ($this->headers as $header) {
            header($header);
        }
        // sends body
        echo $this->body;

    }

    public function setBody($body): Response
    {
        $response = clone $this;
        $response->body = $body;

        return $response;
    }

    public function addHeader($header): Response
    {
        $response = clone $this;
        $response->headers[] = $header;

        return $response;
    }

}