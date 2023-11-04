@extends('layouts.app')
@section('content')
    <div class="container w-100">
        <div class="d-flex align-items-center justify-content-between">
            <div class="fs-2 text-blue">
                Товары на складе
            </div>
            <div class="d-flex align-items-center">
                <form action="{{ route('product.export') }}" method="POST" name="importform" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <button type="submit" class="btn btn-success">Excel</button>
                </form>
                <button type="button" class="btn btn-primary background-blue ms-3" data-bs-toggle="modal"
                    data-bs-target="#productCreate">
                    Создать
                </button>
            </div>
        </div>
        <div class="mt-3">
            <div class="d-flex align-items-center justify-content-start">
                <ul class="nav nav-pills mb-auto">
                    <li class="nav-item">
                        <a href="{{ url('/products?type=Table') }}"
                            class="nav-link d-flex align-items-center justify-content-start @if (app('request')->input('type') === 'Table') active @endif"
                            aria-current="page">
                            <span class="text-blue @if (app('request')->input('type') === 'Table') text-light @endif">Таблица</span>
                        </a>
                    </li>
                    <li class="nav-item ms-3">
                        <a href="{{ url('/products?type=Card') }}"
                            class="nav-link d-flex align-items-center justify-content-start @if (app('request')->input('type') === 'Card') active @endif"
                            aria-current="page">
                            <span class="text-blue @if (app('request')->input('type') === 'Card') text-light @endif">Карточки</span>
                        </a>
                    </li>
                </ul>
                <form action="{{ url('/products?type=' . app('request')->input('type')) }}" method="POST"
                    class="ms-3 flex-fill">
                    @csrf
                    @method('GET')

                    <div class="d-flex align-items-center justify-content-start w-100">
                        <input id="search" type="text" class="form-control w-100" name="search"
                            value="{{ isset($search) ? $search : '' }}" autocomplete="search">
                        <button type="submit" class="btn btn-primary ms-3 background-blue">Поиск</button>
                    </div>
                </form>
            </div>
            @if (count($products) != 0)
                @if (app('request')->input('type') === 'Table')
                    <table class="table table-hover mt-4">
                        <thead>
                            <tr>
                                <th class="fs-5" style="width: 100px" scope="col">Артикул</th>
                                <th class="fs-5" scope="col">Название</th>
                                <th class="fs-5" style='width: 220px' scope="col">Страна производителя</th>
                                <th class="fs-5" style='width: 100px' scope="col">Цена</th>
                                <th class="fs-5" style="width: 130px" scope="col">Количество</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="position-relative">
                                    <th class="fs-5" scope="row">
                                        {{ $product->code }}
                                        <a href="{{ route('product.show', ['product' => $product->id]) }}"
                                            class="position-absolute top-0 bottom-0 start-0 end-0"></a>
                                    </th>
                                    <td class="fs-5">{{ $product->title }}</td>
                                    <td class="fs-5">{{ $product->information->country }}</td>
                                    <td class="fs-5">{{ $product->price }} ₽</td>
                                    <td class="fs-5">{{ $product->amount }} шт</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if (!isset($search))
                        <div class="col-12">
                            {{ $products->links() }}
                        </div>
                    @endif
                @endif
                @if (app('request')->input('type') === 'Card')
                    <div class="row gy-4 mt-2">
                        @foreach ($products as $product)
                            <div class="col-xl-3">
                                <div class="card position-relative">
                                    <div class="p-2">
                                        <img src="{{ asset($product->information->photo_path) }}"
                                            class="card-img-top w-100" alt="..."
                                            style="max-height: 190px; object-fit: contain">
                                    </div>
                                    <div class="card-body border-top ">
                                        <div class="fs-5">
                                            {{ $product->code }}</div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-5 points-1 me-4">{{ $product->title }}</div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="fs-5 points-1 text-end w-100">
                                                {{ $product->information->country }}
                                            </div>
                                        </div>
                                        <div class="fs-5 d-flex align-items-center justify-content-between">
                                            <div class="fs-5 text-blue fw-bolder">
                                                {{ $product->amount }} шт
                                            </div>
                                            <div class="fs-5 text-blue fw-bolder">
                                                {{ $product->price }} ₽
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if (!isset($search))
                            <div class="col-12">
                                {{ $products->links() }}
                            </div>
                        @endif
                    </div>
                @endif
            @else
                <div class="mt-3 w-100 text-center fs-1">Товаров не найдено</div>
            @endif
        </div>
    </div>

    <div class="modal fade" id="productCreate" data-bs-backdrop="static" tabindex="-1" aria-labelledby="productCreateLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productCreateLabel">Создание товара</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="title" class="col-md-3 col-form-label text-md-end">Название</label>

                            <div class="col-md-7">
                                <input id="title" type="text" class="form-control" name="title"
                                    value="{{ old('title') }}" required autocomplete="title" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="country" class="col-md-3 col-form-label text-md-end">Страна производителя</label>

                            <div class="col-md-7">
                                <input id="country" type="text" class="form-control" name="country"
                                    value="{{ old('country') }}" required autocomplete="country" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="price" class="col-md-3 col-form-label text-md-end">Цена</label>

                            <div class="col-md-7">
                                <input id="price" type="number" class="form-control" name="price"
                                    value="{{ old('price') }}" required autocomplete="price" autofocus>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-7">
                                <input id="image" type="file" class="form-control" name="image" required
                                    autocomplete="image" autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary background-blue">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('examples.errorAndSuccessHandler')
@endsection
