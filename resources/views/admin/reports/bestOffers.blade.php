@extends('layouts.admin.master')
@section('content')
@include('message')
<div class="row">
    <div class="col-12 ">
        <div class="card">
            <div class="card-body">
                <form action="{{route('reports.bestOffers')}}" method="get"> 
                <div class="row">
                    <div class="col-md-3">
                        <h3><i class="simple-icon-plane"></i> <span class="d-inline-block">{{ __('admin/app.best_offers_report') }}</span></h3>
                    </div>
                        <div class="col-md-3">
                            <div class="input-group date">
                                <input type="text" class="form-control"  value="{{ $start }}" name="start"
                                placeholder="{{ __('admin/app.start_date') }}">
                                <span class="input-group-text input-group-append input-group-addon">
                                    <i class="simple-icon-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group date">
                                <input type="text" class="form-control"  value="{{ $end }}" name="end"
                                placeholder="{{ __('admin/app.end_date') }}">
                                <span class="input-group-text input-group-append input-group-addon">
                                    <i class="simple-icon-calendar"></i>
                                </span>
                            </div>
                        </div>
                       
                        <div class="col-md-2">
                        <button type="submit" class="btn btn-primary"><i class="iconsminds-filter-2"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('admin/app.offer') }}</th>
                                <th>{{ __('admin/app.booking_count') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                            <tr id="row_{{ $row->id }}">
                                <td> <a href="{{ route('offers.show',$row->offer->id) }}">{{ $row->offer->name }} </a> </td>
                                <td> {{ $row->total }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
