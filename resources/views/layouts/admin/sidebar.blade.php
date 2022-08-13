<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                @if(auth()->user()->type=='admin')

                <li class="active">
                    <a href="{{ route('home') }}">
                        <i class="iconsminds-home"></i>
                        <span>{{ __('admin/app.dashboard') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('services.index') }}">
                        <i class="simple-icon-organization"></i> <span class="d-inline-block">{{ __('admin/app.services') }}</span>
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{ route('users.index') }}">
                        <i class="simple-icon-user-following"></i> <span class="d-inline-block">{{ __('admin/app.users') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('offers.index') }}">
                         <i class="iconsminds-safe-box"></i> <span class="d-inline-block">{{ __('admin/app.offers') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('books.index') }}">
                         <i class="iconsminds-credit-card-3"></i> <span class="d-inline-block">{{ __('admin/app.books') }}</span>
                    </a>
                </li>
                @if(auth()->user()->type=='admin')

                <li>
                    <a href="#reports">
                        <i class="iconsminds-folder-close"></i> {{ __('admin/app.reports') }}
                    </a>
                </li>
                <li>
                    <a href="#generalSetting">
                        <i class="iconsminds-gear-2"></i> {{ __('admin/app.generalSetting') }}
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>

    <div class="sub-menu">
        <div class="scroll">

            <ul class="list-unstyled" data-link="users" id="users">

                <li>
                    <a href="{{ route('users.index') }}">
                        <i class="simple-icon-user-following"></i> <span class="d-inline-block">{{ __('admin/app.users') }}</span>
                    </a>
                </li>

            </ul>
            <ul class="list-unstyled" data-link="reports">
                <li>
                    <a href="{{ route('reports.offer') }}">
                        <i class="simple-icon-chart"></i> <span class="d-inline-block">{{ __('admin/app.offer_reports') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reports.income') }}">
                        <i class="iconsminds-coins"></i> <span class="d-inline-block">{{ __('admin/app.income_reports') }}</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('reports.bestOffers') }}">
                        <i class="simple-icon-plane"></i> <span class="d-inline-block">{{ __('admin/app.best_offers_report') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reports.bestCustomers') }}">
                        <i class="simple-icon-emotsmile"></i> <span class="d-inline-block">{{ __('admin/app.best_customers_report') }}</span>
                    </a>
                </li>

            </ul>
            <ul class="list-unstyled" data-link="generalSetting">
                <li>
                    <a href="{{ route('info.index') }}">
                        <i class="simple-icon-info"></i> <span class="d-inline-block">{{ __('admin/app.website_settings') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('contacts.index') }}">
                        <i class="iconsminds-user"></i> <span class="d-inline-block">{{ __('admin/app.contacts') }}</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('rates.index') }}">
                        <i class="simple-icon-star"></i> <span class="d-inline-block">{{ __('admin/app.rates') }}</span>
                    </a>
                </li>

            </ul>

        </div>
    </div>
</div>
