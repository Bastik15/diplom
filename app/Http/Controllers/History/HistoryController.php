<?php

namespace App\Http\Controllers\History;

use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Http\Request;
use App\Exports\ExportHistory;
use Maatwebsite\Excel\Facades\Excel;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = History::orderBy('created_at', 'desc')->get();

        $histories->loadMissing([
            'user',
            'partner',
            'product',
            'type'
        ]);

        return view('history', compact('histories'));
    }

    public function export()
    {
        return Excel::download(new ExportHistory, 'history.xlsx');
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

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
    }
}
