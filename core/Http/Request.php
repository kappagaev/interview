<?php


namespace Core\Http;


class Request
{
    private string $method;
    /**
     * @var mixed|null
     */
    private $body;
    /**
     * @var mixed|null
     */
    private $files;

    public function __construct(string $method, $body = null, $files = null)
    {
        $this->method = $method;
        $this->body = $body;
        $this->files = $files;
    }

    public function __get($var)
    {
        return $this->body[$var];
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getRoute(): string
    {
        if(!isset($this->body['route'])) {
            return '';
        }
        return $this->body['route'];

    }

    public function only(array $keys)
    {
        $files = array_intersect_key($this->files, array_flip($keys));
        // returns only uploaded files

        $files = array_filter($files, function ($file) {
            return filesize($file['tmp_name']);
        });
        $input = array_intersect_key($this->body, array_flip($keys));
        return array_merge($files, $input);
    }

    public function getBackRoute()
    {
        $parts = parse_url($_SERVER['HTTP_REFERER']);
        parse_str($parts['query'], $query);
        return $query['route'];
    }

    public function getBody()
    {
        return $this->body;
    }


}