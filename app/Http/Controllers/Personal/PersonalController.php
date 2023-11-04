<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\PreRegistration;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        $workers = Worker::all();

        $preRegistration = PreRegistration::all();

        return view('personal', compact('users', 'workers', 'preRegistration'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
    }

    public function update(PreRegistration $user)
    {
        User::create([
            'name' => $user->name,
            'surname' => $user->surname,
            'email' => $user->email,
            'password' => $user->password,
            'role_id' => 1,
        ]);

        $user->delete();

        return back()->with('Success', 'Пользователь успешно добавлен');
    }

    public function destroy(PreRegistration $user)
    {
        $user->delete();

        return back()->with('Success', 'Пользователь успешно удален');
    }
}
