<?php


namespace Core\Services;


class Session
{
    private $session;

    public function __construct()
    {
        $this->session = &$_SESSION;
    }

    public function set(string $key, $value)
    {
        $this->session[$key] = $value;
        return $this;
    }

    public function flash($key)
    {
        if ($this->session[$key] != null) {
            $value = $this->session[$key];
            unset($this->session[$key]);
            return $value;

        }
        return null;
    }

    public function get(string $key)
    {
        return $this->session[$key];
    }

    public function setOld($oldData)
    {
        $this->session['old'] = $oldData;
        return $this;
    }

    public function old($key)
    {
        if ($this->session['old'][$key] != null) {
            $value = $this->session['old'][$key];
            unset($this->session['old'][$key]);
            return $value;
        }
        return null;
    }

    public function delete($key)
    {
        unset($this->session[$key]);

        return $this;
    }
}