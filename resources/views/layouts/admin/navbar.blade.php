<nav class="navbar fixed-top">
    <div class="d-flex align-items-center navbar-left">
        <a href="#" class="menu-button d-none d-md-block">
            <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                <rect x="0.48" y="0.5" width="7" height="1" />
                <rect x="0.48" y="7.5" width="7" height="1" />
                <rect x="0.48" y="15.5" width="7" height="1" />
            </svg>
            <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                <rect x="1.56" y="0.5" width="16" height="1" />
                <rect x="1.56" y="7.5" width="16" height="1" />
                <rect x="1.56" y="15.5" width="16" height="1" />
            </svg>
        </a>
        <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                <rect x="0.5" y="0.5" width="25" height="1" />
                <rect x="0.5" y="7.5" width="25" height="1" />
                <rect x="0.5" y="15.5" width="25" height="1" />
            </svg>
        </a>
    </div>
    <div class="navbar-right">
        <div class="header-icons d-inline-block align-middle">
            <div class="d-none d-md-inline-block align-text-bottom mr-3">
                <div class="custom-switch custom-switch-primary-inverse custom-switch-small pl-1"
                     data-toggle="tooltip" data-placement="left" title="Dark Mode">
                    <input class="custom-switch-input" id="switchDark" type="checkbox" checked>
                    <label class="custom-switch-btn" for="switchDark"></label>
                </div>
            </div>
            {{-- <div class="position-relative d-inline-block">
                <button class="header-icon btn btn-empty" type="button" id="languageButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="simple-icon-flag"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right mt-3 position-absolute" id="languageDropdown">
                    <div class="scroll" style="padding:10px">
                        <div class="d-flex flex-row mb-3  ">
                            <div class="pl-3">
                                <a rel="alternate" href="{{ route('select','ar') }}">
                                    <p class="font-weight-medium mb-1 "> {{ __('admin/app.arabic') }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3  ">
                            <div class="pl-3">
                                <a rel="alternate" href="{{ route('select','en') }}">
                                    <p class="font-weight-medium mb-1 "> {{ __('admin/app.english') }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="position-relative d-inline-block">
                <button class="header-icon btn btn-empty" type="button" id="notificationButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="simple-icon-bell"></i>

                    {{-- <span class="count"> </span> --}}
                </button>
                <div class="dropdown-menu dropdown-menu-right mt-3 position-absolute" id="notificationDropdown">
                    <div class="scroll">

                    </div>
                </div>
            </div>
            <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
                <i class="simple-icon-size-fullscreen"></i>
                <i class="simple-icon-size-actual"></i>
            </button>

        </div>

        <div class="user d-inline-block">
            <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <span class="name">{{ auth()->user()->name }}</span>
                <span>
                    @if(auth()->user()->photo)
                    <img alt="Profile Picture" src="{{ auth()->user()->photo }}" />
                    @endif
                </span>
            </button>

            <div class="dropdown-menu dropdown-menu-right mt-3">
                <a class="dropdown-item" href="{{ route('profile') }}"> <i class="iconsminds-profile"></i> {{ __('admin/app.profile') }}</a>

                    <a class="dropdown-item" href="javascript:void(0)">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                <i class="fa fa-power-off m-r-5 m-l-5"></i> {{ __('admin/app.logout') }}
                            </x-dropdown-link>
                        </form>
                     </a>

            </div>
        </div>
    </div>
</nav>
