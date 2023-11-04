<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\CreateRequest;
use App\Http\Requests\Transaction\StoreRequest;
use App\Models\History;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Worker;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
    }

    public function createExpense(CreateRequest $request)
    {
        $credentials = $request->validated();

        $partners = Partner::all();
        $products = Product::paginate(10);
        $workers = Worker::all();

        if (isset($credentials['search'])) {
            $search = $credentials['search'];

            if (is_numeric($credentials['search'])) $products = Product::where('code', 'LIKE', "%{$search}%")->get();
            else $products = Product::where('title', 'LIKE', "%{$search}%")->get();

            return view('transactionExpense', compact('partners', 'products', 'search'));
        }

        return view('transactionExpense', compact('partners', 'products', 'workers'));
    }

    public function createComing(CreateRequest $request)
    {
        $credentials = $request->validated();

        $partners = Partner::all();
        $products = Product::paginate(10);

        if (isset($credentials['search'])) {
            $search = $credentials['search'];

            if (is_numeric($credentials['search'])) $products = Product::where('code', 'LIKE', "%{$search}%")->get();
            else $products = Product::where('title', 'LIKE', "%{$search}%")->get();

            return view('transactionComing', compact('partners', 'products', 'search'));
        }

        return view('transactionComing', compact('partners', 'products'));
    }

    public function store(StoreRequest $request)
    {
        $credentials = $request->validated();

        $product = Product::find($credentials['product']);

        if ($credentials['type'] == 1) {
            $product->update([
                'amount' => $product->amount + $credentials['amount'],
            ]);
        }

        if ($credentials['type'] == 2) {
            if ($product->amount - $credentials['amount'] < 0) {
                return back()->with('Error', 'Недостаточно товаров');
            }

            $product->update([
                'amount' => $product->amount - $credentials['amount'],
            ]);
        }

        History::create([
            'user_id' => auth()->user()->id,
            'type_id' => $credentials['type'],
            'partner_id' => isset($credentials['partner']) ? $credentials['partner'] : null,
            'worker_id' => isset($credentials['worker']) ? $credentials['worker'] : null,
            'product_id' => $credentials['product'],
            'amount' => $credentials['amount'],
            'remainder' => $product->amount,
        ]);

        return back()->with('Success', 'Транзакция успешно проведена');
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
