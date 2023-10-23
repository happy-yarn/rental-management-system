<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function show(): View|Factory
    {
        return view('pages.auth.login');
    }

    public function store(LoginRequest $request)
    {
        /** @var array $payload */
        $payload = $request->validated();

        /** @var User $user */
        $user = User::query()->where('email', $payload['email'])->first();

        if (!Hash::check($payload['password'], $user->password)) {
            return back()->withErrors(['password' => __('auth.password')]);
        }

        Auth::loginUsingId($user->id);

        return redirect('dashboard');
    }
}
