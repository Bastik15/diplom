<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Http\Requests\Worker\StoreRequest;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function store(StoreRequest $request)
    {
        $credentials = $request->validated();

        Worker::create($credentials);

        return back()->with('Success', 'Рабочий успешно добавлен');
    }

    public function delete(Worker $worker)
    {
        $worker->delete();

        return back()->with('Success', 'Рабочий успешно удален');
    }
}
