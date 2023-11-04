<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PreRegistrationRequest;
use App\Models\PreRegistration as ModelsPreRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PreRegistration extends Controller
{
    public function __invoke(PreRegistrationRequest $request)
    {
        $credentials = $request->validated();
        $credentials['password'] = Hash::make($credentials['password']);

        ModelsPreRegistration::create($credentials);

        return redirect()->route('login');
    }
}
