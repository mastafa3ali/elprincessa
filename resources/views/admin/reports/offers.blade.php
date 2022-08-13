@extends('layouts.admin.master')
@section('content')
@include('message')
<div class="row">
    <div class="col-12 ">
        <div class="card">
            <div class="card-body">
                <form action="{{route('reports.offer')}}" method="get"> 
                <div class="row">
                    <div class="col-md-2">
                        <h3><i class="simple-icon-chart"></i> <span class="d-inline-block">{{ __('admin/app.offer_reports') }}</span></h3>
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
                            <div class="input-group ">
                                <select  class="form-control"   name="status">
                                   <option value="0"{{ $status===0?'selected':'' }} >عرض الكل</option>
                                    <option value="pending" {{ $status==='pending'?'selected':'' }} >{{ __('admin/app.pending') }}</option>
                                    <option value="accepted" {{ $status==='accepted'?'selected':'' }} >{{ __('admin/app.accepted') }}</option>
                                    <option value="rejected" {{ $status==='rejected'?'selected':'' }} >{{ __('admin/app.rejected') }}</option>
                                    <option value="completed" {{ $status==='completed'?'selected':'' }} >{{ __('admin/app.completed') }}</option>
                                    <option value="canceled" {{ $status==='canceled'?'selected':'' }} >{{ __('admin/app.canceled') }}</option>
                                    <option value="accept_canceled" {{ $status==='accept_canceled'?'selected':'' }} >{{ __('admin/app.accept_canceled') }}</option>                                
                                </select>
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
                                <th>{{ __('admin/app.phone') }}</th>
                                <th>{{ __('admin/app.offer') }}</th>
                                <th>{{ __('admin/app.paid_price') }}</th>
                                <th>{{ __('admin/app.wanted_price') }}</th>
                                <th>{{ __('admin/app.date') }}</th>
                                <th>{{ __('admin/app.time') }}</th>
                                <th>{{ __('admin/app.status') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                            <tr id="row_{{ $row->id }}">
                                <td> <a href="{{ route('users.show',$row->user->id) }}">{{ $row->user->name }} </a> </td>
                                <td> {{ $row->user->phone }}  </td>
                                <td> <a href="{{ route('offers.show',$row->offer->id) }}">{{ $row->offer->name }} </a> </td>
                                <td> {{ $row->paid_price }}  </td>
                                <td> {{ $row->offer->price-$row->paid_price }}  </td>
                                <td> {{ $row->date }}  </td>
                                <td> {{ $row->time }}  </td>
                                <td> {{ __('admin/app.'.$row->status) }}  </td>
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
