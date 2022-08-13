@extends('layouts.admin.master')
@section('content')



<div class="row">

    <div class="col-xl-4 col-lg-4">
        <div class="card mb-4 progress-banner">
            <a href="{{ route('users.index') }}">
            <div class="card-body justify-content-between d-flex flex-row align-items-center">
                <div>
                    <i class="iconsminds-male mr-2 text-white align-text-bottom d-inline-block"></i>
                    <div>
                        <p class="lead text-white">{{ countCustomer() }} {{ __('admin/app.customers') }}</p>

                    </div>
                </div>
                <div>
                    <div role="progressbar" class="progress-bar-circle progress-bar-banner position-relative" data-color="white" data-trail-color="rgba(255,255,255,0.2)" aria-valuenow="{{ countCustomer() }}" aria-valuemax="{{ countUsers() }}" data-show-percent="false">
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4">

        <div class="card mb-4 progress-banner">
            <a href="{{ route('offers.index') }}" class="card-body justify-content-between d-flex flex-row align-items-center">
                <div>
                    <i class="iconsminds-male mr-2 text-white align-text-bottom d-inline-block"></i>
                    <div>
                        <p class="lead text-white"> {{ countOffers() }} {{ __('admin/app.offers') }}</p>

                    </div>
                </div>
                <div>
                    <div role="progressbar" class="progress-bar-circle progress-bar-banner position-relative" data-color="white" data-trail-color="rgba(255,255,255,0.2)" aria-valuenow="{{ countOffers() }}" aria-valuemax="{{ countAllOffers() }}" data-show-percent="false">
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4">
        <div class="card mb-4 progress-banner">
            <a href="{{ route('reports.offer') }}?status=pending" class="card-body justify-content-between d-flex flex-row align-items-center">
                <div>
                    <i class="iconsminds-male mr-2 text-white align-text-bottom d-inline-block"></i>
                    <div>
                        <p class="lead text-white"> {{ booksStatus('pending') }} {{ __('admin/app.pending_books') }}</p>

                    </div>
                </div>
                <div>
                    <div role="progressbar" class="progress-bar-circle progress-bar-banner position-relative" data-color="white" data-trail-color="rgba(255,255,255,0.2)" aria-valuenow="{{ booksStatus('pending') }}" aria-valuemax="{{ allBooks() }}" data-show-percent="false">
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4">
        <div class="card mb-4 progress-banner">
            <a href="{{ route('reports.offer') }}?status=accepted" class="card-body justify-content-between d-flex flex-row align-items-center">
                <div>
                    <i class="iconsminds-male mr-2 text-white align-text-bottom d-inline-block"></i>
                    <div>
                        <p class="lead text-white"> {{ booksStatus('accepted') }} {{ __('admin/app.accepted_book') }}</p>

                    </div>
                </div>
                <div>
                    <div role="progressbar" class="progress-bar-circle progress-bar-banner position-relative" data-color="white" data-trail-color="rgba(255,255,255,0.2)" aria-valuenow="{{ booksStatus('accepted') }}" aria-valuemax="{{ allBooks() }}" data-show-percent="false">
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4">
        <div class="card mb-4 progress-banner">
            <a href="{{ route('reports.offer') }}?status=rejected" class="card-body justify-content-between d-flex flex-row align-items-center">
                <div>
                    <i class="iconsminds-male mr-2 text-white align-text-bottom d-inline-block"></i>
                    <div>
                        <p class="lead text-white"> {{ booksStatus('rejected') }} {{ __('admin/app.rejected_book') }}</p>

                    </div>
                </div>
                <div>
                    <div role="progressbar" class="progress-bar-circle progress-bar-banner position-relative" data-color="white" data-trail-color="rgba(255,255,255,0.2)" aria-valuenow="{{ booksStatus('rejected') }}" aria-valuemax="{{ allBooks() }}" data-show-percent="false">
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4">
        <div class="card mb-4 progress-banner">
            <a href="{{ route('reports.offer') }}?status=canceled" class="card-body justify-content-between d-flex flex-row align-items-center">
                <div>
                    <i class="iconsminds-male mr-2 text-white align-text-bottom d-inline-block"></i>
                    <div>
                        <p class="lead text-white"> {{ booksStatus('canceled') }} {{ __('admin/app.canceled_book') }}</p>

                    </div>
                </div>
                <div>
                    <div role="progressbar" class="progress-bar-circle progress-bar-banner position-relative" data-color="white" data-trail-color="rgba(255,255,255,0.2)" aria-valuenow="{{ booksStatus('canceled') }}" aria-valuemax="{{ allBooks() }}" data-show-percent="false">
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>

@endsection
