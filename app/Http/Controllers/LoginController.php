<?php


namespace App\Http\Controllers;


use Core\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        return $this->view('login');
    }

    public function attempt(Request $request)
    {
        $data = $request->only(['email', 'password']);
        $authService = $this->authService;

        $authService->login($data);


        return redirect('');
    }

    public function logout(Request $request)
    {
        $authService = $this->authService;

        $authService->logout();

        return redirect('');
    }
}