<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Partner\StoreRequest;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::paginate(10);

        return view('partner', compact('partners'));
    }

    public function create()
    {
    }

    public function store(StoreRequest $request)
    {
        $credentials = $request->validated();

        Partner::create($credentials);

        return back()->with('Success', 'Контрагент успешно добавлен');
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
    }

    public function update(StoreRequest $request, Partner $partner)
    {
        $credentials = $request->validated();

        $partner->update($credentials);

        return back()->with('Success', 'Контрагент успешно изменен');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();

        return back()->with('Success', 'Контрагент успешно удален');
    }
}
