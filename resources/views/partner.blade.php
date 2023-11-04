@extends('layouts.app')
@section('content')
    <div class="container w-100">
        <div class="d-flex align-items-center justify-content-between">
            <div class="fs-2 text-blue">
                Контрагенты
            </div>
            <button type="button" class="btn btn-primary background-blue" data-bs-toggle="modal" data-bs-target="#partnerAdd">
                Добавить
            </button>
        </div>
        <div class="mt-3">
            @if (count($partners) != 0)
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th class="fs-5" scope="col">#</th>
                            <th class="fs-5" scope="col">Название компании</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($partners as $partner)
                            <tr>
                                <th class="fs-5" scope="row">{{ $loop->iteration }}</th>
                                <td class="fs-5 d-flex">
                                    <form action="{{ route('partner.update', ['partner' => $partner->id]) }}" method="POST"
                                        class="flex-fill d-flex align-items-center justify-content-between w-100">
                                        @csrf
                                        @method('PATCH')
                                        <input id="title" type="text" class="form-control me-3" name="title"
                                            value="{{ $partner->title }}" required autocomplete="title" autofocus>
                                        <button type="submit"
                                            class="btn btn-primary background-blue me-3">Изменить</button>

                                    </form>
                                    <form id="{{ 'destroy-form-' . $partner->id }}"
                                        action="{{ route('partner.destroy', ['partner' => $partner->id]) }}" method="POST"
                                        class="d-flex align-items-center justify-content-between">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="event.preventDefault();
                                        document.getElementById('destroy-form-' . {{ $partner->id }}).submit();">
                                            Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="w-100 text-center fs-1">Партнеры отсутствуют</div>
            @endif
        </div>
    </div>

    <div class="modal fade" id="partnerAdd" data-bs-backdrop="static" tabindex="-1" aria-labelledby="partnerAddLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="partnerAddLabel">Добавление контрагента</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('partner.store') }}" method="POST">
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
