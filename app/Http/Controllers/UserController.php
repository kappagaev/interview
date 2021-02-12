<?php


namespace App\Http\Controllers;

use Core\Http\Request;
use Core\Http\Response;

class UserController extends Controller
{
    public function foo(Request $request): Response
    {
        return $this->view('foo');
    }

    public function create(Request $request): Response
    {
        return $this->view('registration');
    }

    public function edit(Request $request): Response
    {
        $user = $this->auth->user();

        return $this->view('edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $input = $request->only([
            'email',
            'nickname',
            'password',
            'password_confirmed',
            'picture'
        ]);

        $userService = $this->userService;
        $auth = $this->auth->user();

        $data = array_filter(array_diff($input, $auth), function ($item) {
           return $item;
        });

        $user = $userService->update($auth['id'], $data);

        return redirect('?route=profile');
    }

    public function profile(Request $request):Response
    {
        $user = $this->auth->user();

        return $this->view('profile', ['user' => $user]);
    }

    public function store(Request $request): Response
    {
        $input = $request->only([
            'email',
            'nickname',
            'password',
            'password_confirmed',
            'picture'
        ]);

        $userService = $this->userService;
        $user = $userService->save($input);

        return redirect('?router=');
    }
}