@extends('layouts.app')
@section('content')
    <div class="p-4 w-100">
        <div class="d-flex align-items-center justify-content-between">
            <div class="fs-2 text-blue">
                Товар
            </div>
        </div>
        <div class="mt-4">
            <div class="d-flex">
                <div class="border-end pe-2" style="width: 308px">
                    <img src="{{ $product->information->photo_path }}" class="w-100" alt="">
                </div>
                <div class="ms-4 d-flex flex-column flex-fill">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="px-3 py-2 background-blue rounded text-light text-center" style="max-width: 90px">
                            {{ $product->code }}
                        </div>
                        <form action="{{ route('product.destroy', ['product' => $product->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </div>
                    <form action="{{ route('product.update', ['product' => $product->id]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="fs-5 mt-3">
                            <div class="pb-1">Название:</div>
                            <div class="d-flex align-items-center">
                                <input id="title" type="text" style="max-width: 450px" class="form-control w-100"
                                    name="title" value="{{ $product->title }}" required autocomplete="title">
                            </div>
                        </div>
                        <div class="fs-5 mt-3">
                            <div class="pb-1">Цена:</div>
                            <div class="d-flex align-items-center">
                                <input id="price" type="number" style="max-width: 450px" class="form-control w-100"
                                    name="price" value="{{ $product->price }}" required autocomplete="price">
                            </div>
                        </div>
                        <div class="fs-5 mt-3">
                            <div class="pb-1">Страна:</div>
                            <div class="d-flex align-items-center">
                                <input id="country" type="text" style="max-width: 450px" class="form-control w-100"
                                    name="country" value="{{ $product->information->country }}" required
                                    autocomplete="country">
                            </div>
                        </div>
                        <button type="submit" class="mt-3 btn btn-primary background-blue">Изменить</button>
                        <div class="fs-5 mt-3">
                            <div class="border-bottom pb-1 mb-2">Количество:</div>
                            <div class="fs-4">{{ $product->amount }}шт.</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <div class="d-flex align-items-center justify-content-between">
                <div class="fs-2 text-blue">
                    Транзакции
                </div>
            </div>
            @if (count($history) != 0)
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th class="fs-5" style="width: 150px" scope="col">Дата</th>
                            <th class="fs-5" style="width: 260px" scope="col">Исполнитель</th>
                            <th class="fs-5" style="width: 120px" scope="col">Тип</th>
                            <th class="fs-5" style="width: 250px" scope="col">Контрагент</th>
                            <th class="fs-5" style="width: 260px" scope="col">Тех. специалист</th>
                            <th class="fs-5" scope="col">Оборудование</th>
                            <th class="fs-5" style="width: 120px" scope="col">Количество</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($history as $transaction)
                            <tr>
                                <td class="fs-5 ">
                                    {{ \Carbon\Carbon::parse($transaction->created_at)->format('d-m-Y') }}</td>
                                <td class="fs-5 ">{{ $transaction->user->name . ' ' . $transaction->user->surname }}</td>
                                <td class="fs-5 ">{{ $transaction->type->title }}</td>
                                <td class="fs-5 ">
                                    {{ isset($transaction->partner->title) ? $transaction->partner->title : '' }}
                                </td>
                                <td class="fs-5 ">
                                    {{ isset($transaction->worker) ? $transaction->worker->name . ' ' . $transaction->worker->surname : '' }}
                                </td>
                                <td class="fs-5 ">{{ $transaction->product->title }}</td>
                                <td class="fs-5 ">{{ $transaction->amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="w-100 text-center fs-1 mt-3">Транзакции отсутствуют</div>
            @endif
        </div>
    </div>
    @include('examples.errorAndSuccessHandler')
@endsection
