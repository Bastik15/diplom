@extends('layouts.main')

@section('content')
    <div class="position-fixed w-100">
        <div class="px-container" style="height: 29px; background-color: #484f5e">
            <div class="text-light h-100 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center user-select-none">
                        <img class="" src="{{ asset('image/fodom.gif') }}" alt=""
                            style="width: 22px; height: 29px">
                        <div class="ms-2 pe-3 me-3 border-end cursor-pointer fs-12" style="border-color:#797979 !important">
                            Для
                            дома
                        </div>
                    </div>
                    <div class="d-flex align-items-center user-select-none">
                        <img class="" src="{{ asset('image/forbiz.gif') }}" alt=""
                            style="width: 22px; height: 29px">
                        <div class="ms-2 pe-3 me-3 border-end cursor-pointer fs-12" style="border-color:#797979 !important">
                            Для
                            бизнеса</div>
                    </div>
                    <div class="d-flex align-items-center user-select-none">
                        <img class="" src="{{ asset('image/zastro2.gif') }}" alt=""
                            style="width: 22px; height: 29px">
                        <div class="ms-2 cursor-pointer fs-12">Для УГ, СНТ и застройщика</div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center user-select-none">
                        <img class="" src="{{ asset('image/tellik.gif') }}" alt=""
                            style="width: 22px; height: 29px">
                        <div class="ms-2 pe-3 me-3 border-end cursor-pointer fs-12" style="border-color:#797979 !important">
                            +7(498)
                            787-99-11
                        </div>
                    </div>
                    <div class="d-flex align-items-center user-select-none">
                        <img class="" src="{{ asset('image/tellik.gif') }}" alt=""
                            style="width: 22px; height: 29px">
                        <div class="ms-2 pe-3 me-3 border-end cursor-pointer fs-12" style="border-color:#797979 !important">
                            +7(977)
                            444-99-11
                        </div>
                    </div>
                    <div class="d-flex align-items-center user-select-none">
                        <img class="" src="{{ asset('image/wallet.png') }}" alt=""
                            style="width: 18px; height: 18px">
                        <div class="ms-2 pe-3 me-3 border-end cursor-pointer fs-12" style="border-color:#797979 !important">
                            Оплата
                            услуг
                        </div>
                    </div>
                    @if (!Auth::check())
                        <div class="d-flex align-items-center user-select-none">
                            <img class="" src="{{ asset('image/personal-light.png') }}" alt=""
                                style="width: 18px; height: 18px">
                            <a href="{{ route('login') }}" class="ms-2 cursor-pointer fs-12 text-white text-decoration-none"
                                style="border-color:#797979 !important">Личный кабинет
                            </a>
                        </div>
                    @else
                        <div class="d-flex align-items-center user-select-none">
                            <img class="" src="{{ asset('image/moderator.png') }}" alt=""
                                style="width: 18px; height: 18px">
                            <a href="{{ url('/products?type=Table') }}"
                                class="ms-2 pe-3 me-3 border-end cursor-pointer fs-12 text-white text-decoration-none"
                                style="border-color:#797979 !important">
                                Модерация
                            </a>
                        </div>
                        <div class="d-flex align-items-center user-select-none">
                            <img class="" src="{{ asset('image/personal-light.png') }}" alt=""
                                style="width: 18px; height: 18px">
                            <a class="dropdown-item fs-12 ms-2" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Выход</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="px-container bg-white d-flex align-items-center justify-content-between py-4">
            <img src="{{ asset('image/wilogo1.gif') }}" alt="">
            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('image/apartment.png') }}" class="me-2" style="width: 48px" alt="">
                    <span class="fs-16">Интернет в квартиру</span>
                </div>
                <div class="d-flex align-items-center ms-4">
                    <img src="{{ asset('image/home.png') }}" class="me-2" style="width: 48px" alt="">
                    <span class="fs-16">Интернет в дом</span>
                </div>
                <div class="d-flex align-items-center ms-4">
                    <img src="{{ asset('image/television.png') }}" class="me-2" style="width: 48px" alt="">
                    <span class="fs-16">Цифровое ТВ</span>
                </div>
                <div class="d-flex align-items-center ms-4">
                    <img src="{{ asset('image/phone.png') }}" class="me-2" style="width: 48px" alt="">
                    <span class="fs-16">Телефон</span>
                </div>
                <div class="d-flex align-items-center ms-4">
                    <img src="{{ asset('image/security-camera.png') }}" class="me-2" style="width: 48px"
                        alt="">
                    <span class="fs-16">Видеонаблюдение</span>
                </div>
            </div>
        </div>
    </div>
    <div class="slider d-flex align-items-center">
        <div class="px-container">
            <div style="font-size: 72px" class="fw-bold">ИНТЕРНЕТ</div>
            <div style="font-size: 60px; margin-top: -20px" class="fw-bold text-light">В КВАРТИРУ</div>
            <div style="font-size: 30px; margin-top: -10p" class="fw-bold">100 руб. за 100 Мб/c</div>
            <button class="btn btn-outline-light mt-3 fs-4 px-5">Подробнее</button>
        </div>
    </div>
    <div class="mt-5 bg-body">
        <div class="px-container">
            <div class="border-top border-4 border-dark" style="max-width: 240px"></div>
            <span class="w-auto fs-1 fw-bold">
                Интернет в квартиру
            </span>
        </div>
        <div class="px-sm-container mt-4">
            <div class="d-flex align-items-center justify-content-center bg-white border rounded">
                <div class="d-flex align-items-center px-4 flex-fill" style="padding-top: 25px; padding-bottom: 25px">
                    <img src="{{ asset('image/red.gif') }}" style="width: 66px" alt="">
                    <div class="ms-3">
                        <div class="fs-2 fw-bold">Red</div>
                        <div class="fs-12" style="margin-top: -8px">Новый тариф с 01.06.22</div>
                    </div>
                </div>
                <div class="px-5 border-start border-end flex-fill" style="padding-top: 25px; padding-bottom: 25px">
                    <div class="fs-2">60 Мбит/сек</div>
                    <div class="fs-12" style="margin-top: -8px">Скорость доступа</div>
                </div>
                <div class="px-5 border-end flex-fill" style="padding-top: 25px; padding-bottom: 25px">
                    <div class="fs-2">350 Руб/мес</div>
                    <div class="fs-12" style="margin-top: -8px">Стоимость</div>
                </div>
                <div class="px-5 flex-fill" style="padding-top: 25px; padding-bottom: 25px">
                    <button class="btn btn-primary background-blue px-4">Подключить</button>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-center bg-white border rounded mt-4">
                <div class="d-flex align-items-center px-4 flex-fill" style="padding-top: 25px; padding-bottom: 25px">
                    <img src="{{ asset('image/yellow.gif') }}" style="width: 66px" alt="">
                    <div class="ms-3">
                        <div class="fs-2 fw-bold">Yellow</div>
                        <div class="fs-12" style="margin-top: -8px">Новый тариф с 01.06.22</div>
                    </div>
                </div>
                <div class="px-5 border-start border-end flex-fill" style="padding-top: 25px; padding-bottom: 25px">
                    <div class="fs-2">80 Мбит/сек</div>
                    <div class="fs-12" style="margin-top: -8px">Скорость доступа</div>
                </div>
                <div class="px-5 border-end flex-fill" style="padding-top: 25px; padding-bottom: 25px">
                    <div class="fs-2">450 Руб/мес</div>
                    <div class="fs-12" style="margin-top: -8px">Стоимость</div>
                </div>
                <div class="px-5 flex-fill" style="padding-top: 25px; padding-bottom: 25px">
                    <button class="btn btn-primary background-blue px-4">Подключить</button>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-center bg-white border rounded mt-4">
                <div class="d-flex align-items-center px-4 flex-fill" style="padding-top: 25px; padding-bottom: 25px">
                    <img src="{{ asset('image/green.gif') }}" style="width: 66px" alt="">
                    <div class="ms-3">
                        <div class="fs-2 fw-bold">Green</div>
                        <div class="fs-12" style="margin-top: -8px">Новый тариф с 01.06.22</div>
                    </div>
                </div>
                <div class="px-5 border-start border-end flex-fill"
                    style="padding-top: 25px; padding-bottom: 25px; max-width: 415.41px">
                    <div class="fs-2">100 Мбит/сек</div>
                    <div class="fs-12" style="margin-top: -8px">Скорость доступа</div>
                </div>
                <div class="px-5 border-end flex-fill" style="padding-top: 25px; padding-bottom: 25px">
                    <div class="fs-2">550 Руб/мес</div>
                    <div class="fs-12" style="margin-top: -8px">Стоимость</div>
                </div>
                <div class="px-5 flex-fill" style="padding-top: 25px; padding-bottom: 25px">
                    <button class="btn btn-primary background-blue px-4">Подключить</button>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5 bg-body">
        <div class="px-container">
            <div class="border-top border-4 border-dark" style="max-width: 240px"></div>
            <span class="w-auto fs-1 fw-bold">
                Акции и бонусы
            </span>
        </div>
        <div class="px-container mt-4">
            <div class="sale"></div>
        </div>
    </div>
    <div class="mt-5 bg-body">
        <div class="px-container">
            <div class="border-top border-4 border-dark" style="max-width: 240px"></div>
            <span class="w-auto fs-1 fw-bold">
                Оборудование
            </span>
        </div>
        <div class="px-container mt-4 d-flex allign-items-center justify-content-between">
            <div class="w-100 p-3 bg-white border rounded overflow-hidden" style="max-width: 317px">
                <div class="w-100 text-center fs-5">N300 Wi-Fi роутер TL-WR841N</div>
                <div class="bg-body-dark p-2 text-center mt-3 rounded overflow-hidden">
                    <div class="fs-12">N300 Wi-Fi роутер TL-WR841N</div>
                    <div class="fs-12">300 Мбит/с 5 портов 10/100 Мбит/с</div>
                </div>
                <div class="text-center my-3" style="height: 156px">
                    <img src="{{ asset('image/1.jpg') }}" style="width: 156px">
                </div>
                <div class="text-center fs-4 mb-3">Под заказ</div>
                <div class="w-100 btn btn-primary background-blue px-4">Купить</div>
            </div>
            <div class="w-100 p-3 bg-white border rounded overflow-hidden" style="max-width: 317px">
                <div class="w-100 text-center fs-5">Archer C6</div>
                <div class="bg-body-dark p-2 text-center mt-3 rounded overflow-hidden">
                    <div class="fs-12">Archer C6 AC1200 MU-MIMO</div>
                    <div class="fs-12">Wi-Fi гигабитный роутер </div>
                </div>
                <div class="text-center my-3" style="height: 156px">
                    <img src="{{ asset('image/2.jpg') }}" style="width: 156px">
                </div>
                <div class="text-center fs-4 mb-3">Под заказ</div>
                <div class="w-100 btn btn-primary background-blue px-4">Купить</div>
            </div>
            <div class="w-100 p-3 bg-white border rounded overflow-hidden" style="max-width: 317px">
                <div class="w-100 text-center fs-5">Deco E4</div>
                <div class="bg-body-dark p-2 text-center mt-3 rounded overflow-hidden">
                    <div class="fs-12">Deco E4</div>
                    <div class="fs-12">AC1200 Домашняя Mesh Wi-Fi система</div>
                </div>
                <div class="text-center my-3" style="height: 156px">
                    <img src="{{ asset('image/3.jpg') }}" style="width: 156px">
                </div>
                <div class="text-center fs-4 mb-3">Под заказ</div>
                <div class="w-100 btn btn-primary background-blue px-4">Купить</div>
            </div>
        </div>
    </div>
    <div class="mt-5 px-container bg-body">
        <div class="d-flex align-items-center justify-content-start">
            <img src="{{ asset('image/korzina.png') }}" alt="">
            <div class="ms-3 fs-4">
                Еще больше оборудования в нашем интернет-магазине shop.iphouse.ru
            </div>
        </div>
    </div>
    <div class="mt-5 bg-body">
        <div class="px-container">
            <div class="border-top border-4 border-dark" style="max-width: 240px"></div>
            <span class="w-auto fs-1 fw-bold">
                Новости
            </span>
        </div>
        <div class="mt-4 px-container">
            <div class="d-flex align-items-start justify-content-between">
                <div class="text-center d-flex flex-column align-items-center justify-content-start w-100 border rounded bg-white px-3 pt-3 pb-5"
                    style="max-width: 367px">
                    <div class="background-blue px-4 rounded py-1 d-flex align-items-center">
                        <div class="px-2 fs-5 text-white" style="background-color: #0b7dbc">19</div>
                        <span class="ms-3 fs-5 text-white">мая</span>
                    </div>
                    <div class="mt-3">Обновление тарифов с 01.06.2022 г</div>
                    <div class="mt-3 text-blue">Обновление тарифной сетки для услуг доступа в сеть Интернет и КТВ с
                        01.06.2022 г.... </div>
                </div>
                <div class="text-center d-flex flex-column align-items-center justify-content-start w-100 border rounded bg-white px-3 pt-3 pb-5"
                    style="max-width: 367px">
                    <div class="background-blue px-4 rounded py-1 d-flex align-items-center">
                        <div class="px-2 fs-5 text-white" style="background-color: #0b7dbc">04</div>
                        <span class="ms-3 fs-5 text-white">августа</span>
                    </div>
                    <div class="mt-3">Работы по модернизации узлового оборудования</div>
                    <div class="mt-3 text-blue">Профилактические работы утром 05.08.2022 г</div>
                </div>
                <div class="text-center d-flex flex-column align-items-center justify-content-start w-100 border rounded bg-white px-3 pt-3 pb-5"
                    style="max-width: 367px">
                    <div class="background-blue px-4 rounded py-1 d-flex align-items-center">
                        <div class="px-2 fs-5 text-white" style="background-color: #0b7dbc">30</div>
                        <span class="ms-3 fs-5 text-white">декабря</span>
                    </div>
                    <div class="mt-3">График работы в новогоджние праздники</div>
                    <div class="mt-3 text-blue">Новогодние праздники с 31.12.2021 по 08.01.2022</div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer mt-5">
        <div class="px-container h-100 d-flex align-items-center justify-content-between">
            <div class="text-white w-100" style="max-width: 190px">
                <img src="{{ asset('image/small logo.png') }}" alt="">
                <div class="mt-3 fs-12">© 2016-2023 Все права защищены</div>
                <div class="mt-1 fs-12">Политика обработки персональных данных</div>
            </div>
            <div class=" flex-fill mx-5">
                <div class="d-flex align-items-center justify-content-around w-100">
                    <div class="fs-5 text-white">О компании</div>
                    <div class="fs-5 text-white">Документы</div>
                    <div class="fs-5 text-white">Акции</div>
                    <div class="fs-5 text-white">Контакты</div>
                </div>
                <div class="w-100 text-light fs-10 mt-3">
                    Наш интернет: ЖК "Ольховка", ЖК "Ольховка-2", ЖК "Ольховка-3", пос.Володарского, д. Малая Володарка, д.
                    Большая Володарка, д. Малое Саврасово, СНТ "Угреш",д. Большое Сaврасово, СНТ "Березка", СНТ "Березка-2",
                    с. Константиново, д. Плетениха, д. Ждановское, д. Сельвачево, д. Галушино, д. Редькино, д.Прудки, д.
                    Щеголево, КП "Шмелево-парк", СНТ "Приток", д. Нижнее Мячково, д. Титово, СНТ "Замоскворечье", КП
                    "Европейский квартал", д.Григорчиково, КП "Григорчиково, СНТ "Григорчиково", д. Куприяниха, СНТ
                    "Пахра-АГРО", СНТ "Пахра", СНТ "Пахра-2", д. Лукино, СНТ "Эскулап", с.Молоково, д. Орлово, КП "Орловъ",
                    д. Мисайлово, КП "Вудлэнд", д. Дальние Прудищи, ТИЗ "Поляны", СНТ "Лесные поляны", СНТ "Татьянина
                    аллея", с.Остров, микрорайон "Солнечный остров", СНТ "Мосмек", д. Андреевское, микрорайон Тураево г.
                    Лыткарино, пос. РАОС, Технопарк "Андреевское", д. Зеленая слобода, д. Каменное Тяжино.
                </div>
            </div>
            <div class=""></div>
        </div>
    </div>
@endsection
