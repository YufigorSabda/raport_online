<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
<header class="row">
    <nav class="navbar navbar-static-top white-bg-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2" href="#">
                <svg class="icon">
                    <use xlink:href="{{ asset('svg/icon/icon-sprite.svg#ic_bar') }}"></use>
                </svg>
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown" style="font-size: .6rem">
                <a class="d-inline-flex align-items-center dropdown-toggle" type="button" id="user"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="icon-top">
                        <use xlink:href="{{ asset('svg/icon/icon-sprite.svg#ic_profile') }}"></use>
                    </svg>
                </a>
                <div class="dropdown-menu" aria-labelledby="user">
                    <a class="dropdown-item"
                        href="{{ route('profile.index') }}">{{ __('menu_wording.menu_profile') }}</a>
                    <a class="dropdown-item"
                        href="{{ route('profile.password') }}">{{ __('menu_wording.menu_profile_password') }}</a>
                    <a class="dropdown-item" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('menu_wording.menu_logout') }}
                    </a>
                </div>
            </li>
        </ul>
    </nav>
</header>
