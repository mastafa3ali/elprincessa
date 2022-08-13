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
                        <div class="card mb-4 d-none d-lg-block">
                            <div class="card-body">
                                <h5 class="card-title"><span>{{ __('admin/app.image') }}</span>
                                </h5>
                                <div class="row social-image-row gallery">
                                     @foreach ($row->image as $image)
                                    <div class="col-6">
                                        <a href="{{ $image }}">
                                            <img class="img-fluid border-radius" src="{{ $image }}" />
                                        </a>
                                    </div>
                                         @endforeach
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="table-responsive col-md-8">
                        <table  class="table table-bordered">
                            <thead>
                                <tr>

                                    <th>{{ __('admin/app.name') }}</th>
                                    <th>{{ __('admin/app.price') }}</th>
                                    <th>{{ __('admin/app.min_price') }}</th>
                                    <th>{{ __('admin/app.short_description') }}</th>
                                    <th>{{ __('admin/app.status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->price }}</td>
                                    <td>{{ $row->min_price }}</td>
                                    <td>{{ $row->short_description }}</td>
                                    <td>
                                        <div class="custom-switch custom-switch-primary mb-2">
                                            <input class="custom-switch-input" id="active_{{ $row->id }}" {{ $row->active==1?'checked':'' }} value="{{ $row->active==1?0:1 }}" name="active" type="checkbox">
                                            <label class="custom-switch-btn" onclick="modelActive({{ $row->id }},'offers')" ></label>
                                        </div>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        {{ $row->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection




