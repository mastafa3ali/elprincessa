@extends('layouts.admin.master')
@section('content')
@include('message')
<div class="row">
    <div class="col-12 ">
        <div class="card">
            <div class="card-body">
                <form action="{{route('reports.income')}}" method="get"> 
                <div class="row">
                    <div class="col-md-3">
                        <h3><i class="iconsminds-coins"></i> <span class="d-inline-block">{{ __('admin/app.income_reports') }}</span></h3>
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
                                <th>{{ __('admin/app.customer') }}</th>
                                <th>{{ __('admin/app.offer') }}</th>
                                <th>{{ __('admin/app.paid_price') }}</th>
                                <th>{{ __('admin/app.date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($total=0)
                            @foreach ($data as $row)
                            <tr id="row_{{ $row->id }}">
                                <td> <a href="{{ route('users.show',$row->user->id) }}">{{ $row->user->name }} </a> </td>
                                <td> <a href="{{ route('offers.show',$row->offer->id) }}">{{ $row->offer->name }} </a> </td>      
                                <td> {{ $row->paid_price }} </td>
                                <td> {{ $row->date }} </td>
                            </tr>
                            @php($total+=$row->paid_price)
                            @endforeach
                            <tr>
                                <td colspan="2">{{ __('admin/app.total') }}</td>
                                <td>{{ $total }}</td>
                                <td>&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
