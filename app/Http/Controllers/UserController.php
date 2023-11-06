<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index(Request $request): View|Factory
    {
        /** @var int $perPage */
        $perPage = $request->input('per_page', 15);

        $users = User::query()
            ->latest('id')
            ->paginate($perPage);

        return view('pages.users.index', [
            'users' => $users
        ]);
    }

    public function create(Request $request): View|Factory
    {
        return view('pages.users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        return redirect()->to('users.index', Response::HTTP_CREATED);
    }

    public function show(Request $request, User $user): View|Factory
    {
        return view('pages.users.edit', [
            'user' => $user
        ]);
    }
}
