<?php


namespace App\Repositories;


class UserRepository extends BaseDbRepository
{

    public function save(array $data)
    {
        return $this->db->query("INSERT INTO users(email, password, nickname, picture) 
                                        VALUES ('{$data['email']}', '{$data['password']}', '{$data['nickname']}', '{$data['picture']}')" );
    }

    public function getBy(string $field, string $value)
    {
        return $this->db->query("SELECT * FROM users WHERE {$field}='{$value}'")->fetch_assoc();
    }

    public function update($id, $data)
    {
        return $this->db->query("UPDATE users SET " . implode(' ', array_map(function ($key, $item) {
                return $key . "='" . $item . "'";
            }, array_keys($data), $data)) . " WHERE id='{$id}'");
    }
}