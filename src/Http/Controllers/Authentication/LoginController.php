<?php

namespace App\Wire\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public $success = false;

    public function login()
    {
        return view('wire.views.authentication.login');
    }

    public function attemptLogin(Request $request)
    {
        $validated = $request->validate([
            'password' => ['required', 'min:6', 'max:46'],
            'username_or_email' => ['required', 'max:255', 'min:3']
        ]);

        if ($this->checkIfEmail($validated['username_or_email']))
        {
            if (Auth::attempt(['email' => $validated['username_or_email'], 'password' => $validated['password']]))
            {
                $this->success = true;
            }
            else
            {
                $this->success = false;
            }
        }

        elseif (Auth::attempt(['slug' => $validated['username_or_email'], 'password' => $validated['password']]))
        {
            $this->success = true;
        }

        //todo return the required response
        return $this->returnIntended();
    }

    function checkIfEmail($input)
    {
        $find1 = strpos($input, '@');
        $find2 = strpos($input, '.');
        return ($find1 !== false && $find2 !== false && $find2 > $find1);
    }

    function returnIntended()
    {
        if ($this->success)
        {
            return redirect()->intended('wire/dashboard');
        }
        else
        {
            $message = trans('wire::authentication.credentials_does_not_match');
            return redirect()->back()->withErrors(['message' => $message]);
        }
    }
}
