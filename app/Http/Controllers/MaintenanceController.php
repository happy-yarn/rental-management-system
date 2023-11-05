<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index(Request $request): View|Factory
    {
        return view('pages.maintenance.index');
    }
}
