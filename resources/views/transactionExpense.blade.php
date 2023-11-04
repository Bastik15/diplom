@extends('layouts.app')
@section('content')
    <div class="container w-100">
        <div class="fs-2 text-blue">
            Транзакция
        </div>
        <div class="mt-3 d-flex align-items-center justify-content-start">
            <ul class="nav nav-pills mb-auto">
                <li class="nav-item">
                    <a href="{{ route('transaction.createComing') }}"
                        class="nav-link d-flex align-items-center justify-content-start @if (Route::currentRouteName() === 'transaction.createComing') === 'Coming') active @endif"
                        aria-current="page">
                        <span
                            class="fs-5 text-blue @if (Route::currentRouteName() === 'transaction.createComing') === 'Coming') text-light @endif">Приход</span>
                    </a>
                </li>
                <li class="nav-item ms-3">
                    <a href="{{ route('transaction.createExpense') }}"
                        class="nav-link d-flex align-items-center justify-content-start @if (Route::currentRouteName() === 'transaction.createExpense') === 'Expense') active @endif"
                        aria-current="page">
                        <span
                            class="fs-5 text-blue @if (Route::currentRouteName() === 'transaction.createExpense') === 'Expense') text-light @endif">Расход</span>
                    </a>
                </li>
            </ul>

            <form action="{{ route('transaction.createExpense') }}" method="POST" class="ms-3 flex-fill">
                @csrf
                @method('GET')

                <div class="d-flex align-items-center justify-content-start w-100">
                    <input id="search" type="text" class="form-control w-100" name="search"
                        value="{{ isset($search) ? $search : '' }}" required autocomplete="search">
                    <button type="submit" class="btn btn-primary ms-3 background-blue">Поиск</button>
                </div>
            </form>
        </div>
        <form class="mt-4" action="{{ route('transaction.store') }}" method="POST">
            @csrf
            @method('POST')
            @if (count($products) === 0)
                <div class="mt-3 w-100 text-center fs-1">Товаров не найдено</div>
            @endif

            @if (count($products) !== 0)
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th class="" style="width: 50px" scope="col"></th>
                            <th class="fs-5" style="width: 100px" scope="col">Артикул</th>
                            <th class="fs-5" scope="col">Название</th>
                            <th class="fs-5" style='width: 220px' scope="col">Страна производителя</th>
                            <th class="fs-5" style="width: 130px" scope="col">Количество</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="">
                                    <input class="form-check-input" type="radio" required name="product"
                                        id="product-{{ $product->id }}" value="{{ $product->id }}">
                                </td>
                                <td class="fs-5">{{ $product->code }}</td>
                                <td class="fs-5">{{ $product->title }}</td>
                                <td class="fs-5">{{ $product->information->country }}</td>
                                <td class="fs-5">{{ $product->amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if (!isset($search))
                    <div class="w-100 mt-3">
                        {{ $products->links() }}
                    </div>
                @endif
            @endif

            @if (count($products) !== 0)
                <input type="hidden" name="type"
                    value="{{ Route::currentRouteName() === 'transaction.createComing' ? 1 : 2 }}">
                <div class="d-flex align-items-center justify-content-start">
                    <div class="mt-4 flex-fill d-flex align-items-center">
                        <div class="w-100" style="max-width: 360px">
                            <select class="form-select w-100" aria-label="Default select example" autofocus name="worker">
                                @foreach ($workers as $worker)
                                    <option value="{{ $worker->id }}">{{ $worker->name }} {{ $worker->surname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="ms-3">
                            <input id="amount" type="number" style="max-width: 180px" placeholder="Кол-во"
                                class="form-control @error('amount') is-invalid @enderror" name="amount"
                                value="{{ old('amount') }}" required autocomplete="amount" autofocus>

                            @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    @if (isset($products))
                        @if (count($products) !== 0)
                            <div class="mt-4 ms-3">
                                <button type="submit" class="btn btn-primary background-blue">Создать</button>
                            </div>
                        @endif
                    @endif
                </div>
            @endif
        </form>
    </div>

    @include('examples.errorAndSuccessHandler')
@endsection
