<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function index(): View
    {
        return view('user.index');
    }

    public function datatables(UserService $user): Object
    {
        return $user->getDatatables();
    }

    public function create(): View
    {
        return view('user.create');
    }

    public function store(CreateUserRequest $request): RedirectResponse
    {
        User::create($request->all());
        return redirect('/user')->with('success', 'Sukses menambahkan user');
    }

    public function edit(User $user): View
    {
        return view("user.edit", compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->all());
        return redirect('/user')->with('success', 'Sukses mengedit user');
    }

    public function destroy(User $user): JsonResponse
    {
        $user->delete();
        return response()->json('Sukses menghapus user');
    }

}
