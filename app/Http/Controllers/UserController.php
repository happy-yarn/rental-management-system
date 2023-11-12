<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $typeOptions = UserType::formSelectOptions();

        return view('pages.users.create', [
            'typeOptions' => $typeOptions
        ]);
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {
        /** @var array $payload */
        $payload = $request->validated();

        User::query()->create([
            'name' => $payload['name'],
            'email' => $payload['email'],
            'email_verified_at' => now(),
            'password' => Hash::make($payload['password']),
            'type' => $payload['type'],
        ]);

        return redirect()->to(route('users.index'), Response::HTTP_CREATED)->with('success', $payload['name'] . ' has been created!');
    }

    public function show(Request $request, User $user): View|Factory
    {
        $typeOptions = UserType::formSelectOptions();

        return view('pages.users.edit', [
            'user' => $user,
            'typeOptions' => $typeOptions
        ]);
    }

    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        /** @var array $payload */
        $payload = $request->validated();

        if (filled($payload['new_password']) && filled($payload['current_password'] && !Hash::check($payload['current_password'], $user->password))) {
            return back()->with('danger', 'Unable to change password, update failed!');
        } else {
            $payload['password'] = Hash::make($payload['new_password']);
        }

        $user->update($payload);

        return redirect()->to(route('users.index'))->with('success', $payload['name'] . ' has been updated!');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        $user->delete();

        return back()->with('success', $user->name . ' has been deleted!');
    }
}
