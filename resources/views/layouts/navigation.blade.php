<aside class="navbar-default navbar-static-side hidden-print" role="navigation">
    <nav class="sidebar-collapse" id="sidebar-menu">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element text-center">
                    <img class="img-fluid" src="{{ asset('logo/logo.png') }}" alt="logo" width="50px;" />
                </div>
                <div class="logo-element text-uppercase">
                    <img class="img-fluid" src="{{ asset('logo/logo.png') }}" alt="logo" width="50px;" />
                </div>
            </li>

            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <svg class="icon">
                        <use xlink:href="{{ asset('svg/nav/nav-sprite.svg#ic_home') }}"></use>
                    </svg>
                    <span class="nav-label">{{ __('menu_wording.menu_home') }}</span></a>
            </li>

            <!-- START USERS -->
            @can('Data Sekolah')
                <li>
                    <a href="#">
                        <svg class="icon">
                            <use xlink:href="{{ asset('svg/nav/nav-sprite.svg#ic_business') }}"></use>
                        </svg>
                        <span class="nav-label">Data Sekolah</span><span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        @can('Sekolah')
                            <li class=""><a href="{{ route('sekolah.index') }}">Sekolah</a></li>
                        @endcan
                        @can('Kepala Sekolah')
                            <li class=""><a href="{{ route('kepala-sekolah.index') }}">Kepala Sekolah</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('Pengguna')
                <li>
                    <a href="#">
                        <svg class="icon">
                            <use xlink:href="{{ asset('svg/nav/nav-sprite.svg#ic_user') }}"></use>
                        </svg>
                        <span class="nav-label">{{ __('menu_wording.menu_user') }}</span><span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        @can('Siswa')
                            <li class=""><a
                                    href="{{ route('student.index') }}">{{ __('menu_wording.menu_student') }}</a></li>
                        @endcan
                        @can('Guru')
                            <li class=""><a
                                    href="{{ route('teacher.index') }}">{{ __('menu_wording.menu_teacher') }}</a></li>
                        @endcan
                        @can('Operator')
                            <li class=""><a
                                    href="{{ route('operator.index') }}">{{ __('menu_wording.menu_operator') }}</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <!-- END USERS  -->

            <!--START REPORT -->
            @can('report.index')
                <li>
                    <a href="#">
                        <svg class="icon">
                            <use xlink:href="{{ asset('svg/nav/nav-sprite.svg#ic_report') }}"></use>
                        </svg>
                        <span class="nav-label">{{ __('menu_wording.menu_report.menu') }}</span><span
                            class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        @can('reportstaff.index')
                            <li class=""><a
                                    href="{{ route('reportstaff.index') }}">{{ __('menu_wording.menu_staff') }}</a></li>
                        @endcan
                        @can('reportstudent.index')
                            <li class=""><a
                                    href="{{ route('reportstudent.index') }}">{{ __('menu_wording.menu_student') }}</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <!-- END REPORT  -->

            <!-- START SETTING  -->
            @can('setting.index')
                <li>
                    <a href="{{ route('setting.index') }}">
                        <svg class="icon">
                            <use xlink:href="{{ asset('svg/nav/nav-sprite.svg#ic_setting') }}"></use>
                        </svg>
                        <span class="nav-label">{{ __('menu_wording.menu_setting') }}</span></a>
                </li>
            @endcan
            <!-- END SETTING -->

            <!-- START SECURITY -->
            @can('security.index')
                <li>
                    <a href="#">
                        <svg class="icon">
                            <use xlink:href="{{ asset('svg/nav/nav-sprite.svg#ic_security') }}"></use>
                        </svg>
                        <span class="nav-label">{{ __('menu_wording.menu_security.menu') }}</span><span
                            class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        @can('permission.index')
                            <li class=""><a
                                    href="{{ route('permission.index') }}">{{ __('menu_wording.menu_security.modul') }}</a>
                            </li>
                        @endcan
                        @can('role.index')
                            <li class=""><a
                                    href="{{ route('role.index') }}">{{ __('menu_wording.menu_security.role') }}</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <!-- END SECURITY -->

        </ul>

    </nav>
</aside>
