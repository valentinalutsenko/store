<?php

namespace App\Services\Login;

use App\Http\Requests\LoginRequest;
use http\Env\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function loginUser(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)){
            return redirect()->to('login')
                             ->withErrors(trans('auth.failed'));
        };

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        return $this->authenticated($request, $user);
    }

//    public function perform()
//    {
//        Session::flush();
//
//        Auth::logout();
//
//        return redirect('login');
//    }

    protected function authenticated(Request $request, $user): RedirectResponse
    {
        return redirect()->intended();
    }
}
