<?php


namespace App\Repositories;


use Core\Services\Db;

class BaseDbRepository
{
    /**
     * @var Db
     */
    protected Db $db;

    public function __construct(Db $db)
    {
        $this->db = $db;
    }
}