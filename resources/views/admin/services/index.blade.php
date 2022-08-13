@extends('layouts.admin.master')
@section('content')
<div class="row">
    <div class="col-12">
        <span class="float-right">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
            data-target="#Create">
            {{ __('admin/app.create') }} <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
        </span>
        <h1>{{ __('admin/app.'.$title) }}</h1>
        @include('message')
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
                                <th>{{ __('admin/app.name') }}</th>
                                <th>{{ __('admin/app.photo') }}</th>
                                <th>{{ __('admin/app.description') }}</th>
                                <th>{{ __('admin/app.active') }}</th>
                                <th>{{ __('admin/app.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                            <tr id="row_{{ $row->id }}">
                                <td> {{ $row->name }}  </td>
                                <td>
                                    <div class="row social-image-row gallery">
                                        <a href="{{ $row->image }}">
                                            <img src="{{ $row->image }}" alt="{{ $row->name }}" class="list-thumbnail border-0">
                                        </a>
                                    </div>
                                </td>
                                <td> {{ $row->description }}  </td>

                                <td>
                                    <div class="custom-switch custom-switch-primary mb-2">
                                        <input class="custom-switch-input" id="active_{{ $row->id }}" {{ $row->active==1?'checked':'' }} value="{{ $row->active==1?0:1 }}" name="active" type="checkbox">
                                        <label class="custom-switch-btn " onclick="modelActive({{ $row->id }},'services')" ></label>
                                    </div>
                                </td>
                                <td>
                                     <button type="button" class="btn btn-outline-primary btn-xs mb-1" data-toggle="modal" data-target="#Edit{{ $row->id }}">
                                        <i class="simple-icon-pencil"></i> <i class="fa fa-plus" aria-hidden="true"></i>
                                     </button>


                                     <button type="button" class="btn btn-outline-danger btn-xs mb-1 " data-toggle="modal"
                                     data-target=".delete_Modal_{{ $row->id }}"><i class="iconsminds-securiy-remove"></i></button>

                                    <div class="modal fade bd-example-modal-sm delete_Modal_{{ $row->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{ __('admin/app.delete') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                   <p> {{ __('admin/app.are_you_sure_you_want_to_delete') }}</p>
                                                   <br>
                                                    <button class="btn btn-primary " onclick="deleteModel({{ $row->id }},'services')">{{ __('admin/app.save') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="modal fade" id="Edit{{ $row->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="Edit{{ $row->id }}Label">{{ __('admin/app.'.$title) }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form  class="tooltip-right-bottom" action="{{route('services.update',$row->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
                                                        @method('PUT')
                                                        @csrf
                                                    <div class="card-body">
                                                            <input type="hidden" name="id" value="{{$row->id}}">

                                                            <div class="form-group has-float-label">
                                                                <input class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('admin/app.name') }}" name="name" value="{{ old('name')?old('name'):$row->name }}" required  />
                                                                @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group has-float-label">
                                                                <textarea class="form-control @error('description') is-invalid @enderror" placeholder="{{ __('admin/app.description') }}" name="description"  >{{ old('description')?old('description'):$row->description }}</textarea>
                                                                @error('description')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group has-float-label">
                                                                <input type="file" class="form-control @error('photo') is-invalid @enderror" placeholder="{{ __('admin/app.photo') }}" name="photo"  />
                                                                @error('photo')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ __('admin/app.close') }}</button>
                                                            <button type="submit" class="btn btn-primary">{{ __('admin/app.save') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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


<div class="modal fade" id="Create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CreateLabel">{{ __('admin/app.'.$title) }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form  class="tooltip-right-bottom" action="{{route('services.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                        <div class="form-group has-float-label">
                            <input class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('admin/app.name') }}" name="name" value="{{ old('name') }}" required />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group has-float-label">
                            <input class="form-control @error('description') is-invalid @enderror" placeholder="{{ __('admin/app.description') }}" name="description"  />{{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="form-group has-float-label">
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" placeholder="{{ __('admin/app.photo') }}" name="photo" required />
                            @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('admin/app.close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('admin/app.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection