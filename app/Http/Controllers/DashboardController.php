<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show(): View|Factory
    {
        return view('pages.dashboard');
    }
}
