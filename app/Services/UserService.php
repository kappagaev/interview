<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Core\Exceptions\ValidationException;
use Core\Services\Validator;

class UserService
{
    private UserRepository $repository;

    private Validator $validator;

    public function __construct(UserRepository $repository, Validator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function save(array $data)
    {
        $validator = $this->validator->make($data, [
            'email'     => 'required|email|uniqueInUsers',
            'password'  => 'required|confirmed|charsOrNumbers',
            'nickname'  => 'lengthFrom2to32|charsOrNumbers|uniqueInUsers',
            'picture'    => 'nullable|image'
        ])->validate();

        if($validator->hasErrors()) {
            throw (new ValidationException())->setErrors($validator->getErrors());
        }

        $data['picture'] = $data['picture'] != null ? $this->savePicture($data['picture']):'default.png';
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        return $this->repository->save($data);
    }

    private function savePicture($file): string
    {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $name = rand() . '.' . $ext;
        move_uploaded_file(
            $file['tmp_name']
            , HOME_PATH . '/uploads/' . $name);

        return $name;

    }

    public function update($id, $data)
    {
        $rules =  [
            'email'     => 'required|email|uniqueInUsers',
            'password'  => 'required|confirmed|charsOrNumbers',
            'nickname'  => 'lengthFrom2to32|charsOrNumbers|uniqueInUsers',
            'picture'    => 'nullable|image'
        ];
        // takes only $data keys rules
        $rules = array_intersect_key($rules, array_flip(array_keys($data)));

        $validator = $this->validator->make($data, $rules)
                                    ->validate();

        if($validator->hasErrors()) {
            throw (new ValidationException())->setErrors($validator->getErrors());
        }

        if($data['password']) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }
        if($data['picture']) {
            $data['picture'] = $this->savePicture($data['picture']);
        }

        return $this->repository->update($id, $data);
    }
}