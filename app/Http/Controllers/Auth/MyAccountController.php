<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use App\Http\Controllers\Controller;

class MyAccountController extends Controller
{
    public function show(): View|Factory
    {
        return view('pages.account');
    }
}
