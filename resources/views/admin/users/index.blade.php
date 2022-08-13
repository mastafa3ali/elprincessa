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
                                <th>{{ __('admin/app.phone') }}</th>
                                <th>{{ __('admin/app.rate') }}</th>
                                <th>{{ __('admin/app.email') }}</th>
                                <th>{{ __('admin/app.type') }}</th>

                                <th>{{ __('admin/app.active') }}</th>
                                <th>{{ __('admin/app.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                            <tr id="row_{{ $row->id }}">
                                <td> <a href="{{ route('users.show',$row->id) }}">{{ $row->name }} </a> </td>
                                <td> {{ $row->phone }} </td>
                                <td> {{ $row->rate }} <i class="simple-icon-star text-warning" aria-hidden="true"></i> </td>
                                <td> {{ $row->email }} </td>
                                <td> {{ __('admin/app.'.$row->type) }} </td>

                                <td>
                                    <div class="custom-switch custom-switch-primary mb-2">
                                        <input class="custom-switch-input" id="active_{{ $row->id }}" {{ $row->active==1?'checked':'' }} value="{{ $row->active==1?0:1 }}" name="active" type="checkbox">
                                        <label class="custom-switch-btn" onclick="modelActive({{ $row->id }},'users')" ></label>
                                    </div>

                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary btn-xs mb-1" data-toggle="modal" data-target="#Edit{{ $row->id }}">
                                       <i class="simple-icon-pencil"></i> <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                    @if(auth()->user()->type =='admin')
                                        <button type="button" class="btn btn-outline-danger btn-xs mb-1 " data-toggle="modal"
                                        data-target=".delete_Modal_{{ $row->id }}"><i class="iconsminds-securiy-remove"></i></button>
                                    @endif
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
                                                   <button class="btn btn-primary " onclick="deleteModel({{ $row->id }},'users')">{{ __('admin/app.save') }}</button>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                                    <div class="modal fade" id="Edit{{ $row->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                       <div class="modal-dialog" role="document">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <h5 class="modal-title" id="Edit{{ $row->id }}Label">{{ __('admin/app.user_management') }}</h5>
                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                   </button>
                                               </div>
                                               <div class="modal-body">
                                                   <form  class="tooltip-right-bottom" action="{{route('users.update',$row->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
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
                                                               <input class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('admin/app.email') }}" name="email" value="{{ old('email')?old('email'):$row->email }}" required />
                                                               @error('email')
                                                               <span class="invalid-feedback" role="alert">
                                                                   <strong>{{ $message }}</strong>
                                                               </span>
                                                               @enderror
                                                           </div>
                                                           <div class="form-group has-float-label">
                                                               <input class="form-control @error('phone') is-invalid @enderror" placeholder="{{ __('admin/app.phone') }}" name="phone" value="{{ old('phone')?old('phone'):$row->phone }}" required />
                                                               @error('phone')
                                                               <span class="invalid-feedback" role="alert">
                                                                   <strong>{{ $message }}</strong>
                                                               </span>
                                                               @enderror
                                                           </div>
                                                           <div class="form-group has-float-label">
                                                               @if(auth()->user()->type =='admin')
                                                            <select class="form-control @error('type') is-valid @enderror" name="type" required>
                                                                <option value="customer"{{ $row->type=='customer'?'selected':'' }}>{{ __('admin/app.customer') }}</option>
                                                                <option value="support"{{ $row->type=='support'?'selected':'' }}>{{ __('admin/app.support') }}</option>
                                                            </select>

                                                               @error('type')
                                                               <span class="invalid-feedback" role="alert">
                                                                   <strong>{{ $message }}</strong>
                                                               </span>
                                                               @enderror
                                                               @else
                                                               <input type="hidden" name="type" value="customer">
                                                               @endif
                                                           </div>
                                                           <div class="form-group has-float-label">
                                                               <textarea class="form-control @error('bio') is-invalid @enderror" placeholder="{{ __('admin/app.bio') }}" name="bio"  >{{ old('bio')?old('bio'):$row->bio }}</textarea>
                                                               @error('bio')
                                                               <span class="invalid-feedback" role="alert">
                                                                   <strong>{{ $message }}</strong>
                                                               </span>
                                                               @enderror
                                                           </div>

                                                           <div class="form-group has-float-label">
                                                               <input type="file" class="form-control @error('image') is-invalid @enderror" placeholder="{{ __('admin/app.image') }}" name="image"  />
                                                               @error('image')
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
                    <form  class="tooltip-right-bottom" action="{{route('users.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
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
                            <input class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('admin/app.email') }}" name="email" value="{{ old('email') }}" required />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group has-float-label">
                            <input class="form-control @error('phone') is-invalid @enderror" placeholder="{{ __('admin/app.phone') }}" name="phone"  />{{ old('phone') }}</textarea>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group has-float-label">
                            @if(auth()->user()->type =='admin')
                                
                            <select class="form-control @error('type') is-valid @enderror" name="type" required>
                                <option value="customer">{{ __('admin/app.customer') }}</option>
                                <option value="support">{{ __('admin/app.support') }}</option>
                            </select>
                            
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            @else
                            <input type="hidden" name="type" value="customer">
                            @endif
                        </div>
                        <div class="form-group has-float-label">
                            <input type="file" class="form-control @error('image') is-invalid @enderror" placeholder="{{ __('admin/app.image') }}" name="image"  />
                            @error('image')
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




