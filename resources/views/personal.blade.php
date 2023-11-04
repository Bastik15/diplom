@extends('layouts.app')
@section('content')
    <div class="container w-100">
        <div class="d-flex align-items-center justify-content-between">
            <div class="fs-2 text-blue">
                Сотрудники
            </div>
            <button class="btn btn-primary background-blue" data-bs-toggle="modal" data-bs-target="#workerCreate">Добавить тех.
                специалиста</button>
        </div>
        <div class="">
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th class="fs-5 align-middle" style="height: 54.05px; width: 250px" scope="col">Имя</th>
                        <th class="fs-5 align-middle" style="height: 54.05px; width: 350px" scope="col">Фамилия</th>
                        <th class="fs-5 align-middle" style="height: 54.05px" scope="col">Почта</th>
                        <th class="fs-5 align-middle" style="height: 54.05px; width: 160px" scope="col">Роль</th>
                        <th class="fs-5 align-middle" style="height: 54.05px; width: 120px" scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="position-relative">
                            <td class="fs-5 align-middle" style="height: 54.05px">
                                {{ $user->name }}
                                {{-- <a href="{{ route('product.show', ['product' => $product->id]) }}"
                                    class="position-absolute top-0 bottom-0 start-0 end-0"></a> --}}
                            </td>
                            <td class="fs-5 align-middle" style="height: 54.05px">{{ $user->surname }}</td>
                            <td class="fs-5 align-middle" style="height: 54.05px">{{ $user->email }}</td>
                            <td class="fs-5 align-middle" style="height: 54.05px">{{ $user->role->title }}</td>
                            <td class="fs-5 align-middle" style="height: 54.05px"></td>
                        </tr>
                    @endforeach
                    @foreach ($workers as $worker)
                        <tr class="position-relative">
                            <td class="fs-5 align-middle">
                                {{ $worker->name }}
                                {{-- <a href="{{ route('product.show', ['product' => $product->id]) }}"
                                    class="position-absolute top-0 bottom-0 start-0 end-0"></a> --}}
                            </td>
                            <td class="fs-5 align-middle">{{ $worker->surname }}</td>
                            <td class="fs-5 align-middle">{{ $worker->email }}</td>
                            <td class="fs-5 align-middle">Тех. специалист</td>
                            <td class="fs-5">
                                <form id="{{ 'destroy-form-' . $worker->id }}"
                                    action="{{ route('worker.destroy', ['worker' => $worker->id]) }}" method="POST"
                                    class="d-flex align-items-center justify-content-end">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="event.preventDefault();
                                        document.getElementById('destroy-form-' . {{ $worker->id }}).submit();">
                                        Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4 d-flex align-items-center justify-content-between">
            <div class="fs-2 text-blue">
                Запросы на регистрацию
            </div>
        </div>
        <div class="mt-3">
            @if (count($preRegistration) > 0)
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th class="fs-5" style="width: 250px" scope="col">Имя</th>
                            <th class="fs-5" style="width: 350px" scope="col">Фамилия</th>
                            <th class="fs-5" scope="col">Почта</th>
                            <th class="fs-5" style="width: 100px" scope="col"></th>
                            <th class="fs-5" style="width: 100px" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($preRegistration as $user)
                            <tr class="position-relative">
                                <td class="fs-5">
                                    {{ $user->name }}
                                    {{-- <a href="{{ route('product.show', ['product' => $product->id]) }}"
                                    class="position-absolute top-0 bottom-0 start-0 end-0"></a> --}}
                                </td>
                                <td class="fs-5">{{ $user->surname }}</td>
                                <td class="fs-5">{{ $user->email }}</td>
                                <td class="fs-5">
                                    <form action="{{ route('personal.update', ['user' => $user->id]) }}" method="POST">
                                        @csrf
                                        @method('patch')
                                        <button type="submit" class="btn btn-primary background-blue">Добавить</button>
                                    </form>
                                </td>
                                <td class="fs-5">
                                    <form action="{{ route('personal.destroy', ['user' => $user->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Отклонить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="mt-4 w-100 text-center fs-1">Запросы отсутствуют</div>
            @endif

        </div>
    </div>

    <div class="modal fade" id="workerCreate" data-bs-backdrop="static" tabindex="-1" aria-labelledby="workerCreateLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="workerCreateLabel">Новый рабочий</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('worker.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="name" class="col-md-3 col-form-label text-md-end">Имя</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="surname" class="col-md-3 col-form-label text-md-end">Фамилия</label>

                            <div class="col-md-7">
                                <input id="surname" type="text" class="form-control" name="surname"
                                    value="{{ old('surname') }}" required autocomplete="surname" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-3 col-form-label text-md-end">Почта</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
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
