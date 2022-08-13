@extends('layouts.admin.master')
@section('content')
<div class="row">
    <div class="col-12">
        <h1>{{ __('admin/app.user_management') }}</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('admin/app.teacher') }}</th>
                                <th>{{ __('admin/app.student') }}</th>
                                <th>{{ __('admin/app.type') }}</th>
                                <th>{{ __('admin/app.category') }}</th>
                                <th>{{ __('admin/app.date_of_booking') }}</th>
                                <th>{{ __('admin/app.status') }}</th>
                                <th>{{ __('admin/app.status') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                            <tr>
                                <td> <a href="{{ route('users.show',$row->appointment->teacher->id) }}">{{ $row->appointment->teacher->name }} </a> </td>
                                <td> <a href="{{ route('users.show',$row->student->id) }}">{{ $row->student->name }} </a> </td>
                                <td> {{ __('admin/app.'.$row->appointment->type) }}  </td>
                                <td> {{ $row->appointment->category?$row->appointment->category->name:'' }}  </td>
                                <td> {{ $row->created_at }}  </td>
                                <td> <span id="status_{{ $row->id }}"> {{ __('admin/app.'.$row->status) }}</span> </td>
                                <td>
                                    <button type="button"  onclick="changeProjectStatus({{ $row->id }},'accepted','{{ __('admin/app.accepted') }}')" class="btn btn-success">{{ __('admin/app.accept') }}</button>
                                    <button type="button"  onclick="changeProjectStatus({{ $row->id }},'canceled','{{ __('admin/app.canceled') }}')" class="btn btn-danger">{{ __('admin/app.reject') }}</button>
                                </td>
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




