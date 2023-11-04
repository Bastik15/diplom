<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link ms-2 fs-5" href="#" role="button" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false" v-pre>
        {{-- @foreach (auth()->user()->about()->get() as $user)
            <img class="header-profile" src="{{ asset($user->photoPath) }}" alt="">
        @endforeach --}}
        {{ auth()->user()->name }}
    </a>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        {{-- Личный кабинет --}}
        {{-- <a class="dropdown-item" href="{{ route('profile.index', auth()->user()->id) }}">Настройки</a> --}}

        {{-- Выход --}}
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
            {{ __('Выход') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>
