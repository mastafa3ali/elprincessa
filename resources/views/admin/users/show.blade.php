@extends('layouts.admin.master')
@section('content')
<div class="row">
    <div class="col-12">
        <span class="float-right">

        </span>
        <h1>{{ $row->name }}</h1>
        @include('message')
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row social-image-row gallery">
                            <a href="{{ $row->photo }}" style="width:100%">
                                <img src="{{ $row->photo }}" alt="{{ $row->name }}" class="list-thumbnail border-0" style="width:100%">
                            </a>
                        </div>
                        <div class="row">
                            {{ $row->bio }}
                        </div>
                    </div>
                    <div class="table-responsive col-md-8">
                        <table  class="table table-bordered">
                            <thead>
                                <tr>

                                    <th>{{ __('admin/app.phone') }}</th>
                                    <th>{{ __('admin/app.rate') }}</th>
                                    <th>{{ __('admin/app.email') }}</th>
                                    <th>{{ __('admin/app.type') }}</th>
                                    <th>{{ __('admin/app.status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $row->phone }}</td>
                                    <td>{{ $row->rate }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ __('admin/app.'.$row->type) }}</td>

                                    <td>
                                        <div class="custom-switch custom-switch-primary mb-2">
                                            <input class="custom-switch-input" id="active_{{ $row->id }}" {{ $row->active==1?'checked':'' }} value="{{ $row->active==1?0:1 }}" name="active" type="checkbox">
                                            <label class="custom-switch-btn" onclick="modelActive({{ $row->id }},'users')" ></label>
                                        </div>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection




