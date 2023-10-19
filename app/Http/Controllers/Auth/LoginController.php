<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show(): View|Factory
    {
        return view('pages.auth.login');
    }

    public function store(Request $request)
    {}
}
