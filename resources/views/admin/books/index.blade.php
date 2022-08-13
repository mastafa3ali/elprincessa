@extends('layouts.admin.master')
@section('content')
<div class="row">
    <div class="col-12">
        <span class="float-right">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
            data-target="#Create">
            {{ __('admin/app.create') }} <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
            data-target="#CreateUser">
            {{ __('admin/app.createUser') }} <i class="fa fa-plus" aria-hidden="true"></i>
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
                                <th>{{ __('admin/app.booikng_number') }}</th>
                                <th>{{ __('admin/app.customer') }}</th>
                                <th>{{ __('admin/app.phone') }}</th>
                                <th>{{ __('admin/app.offer') }}</th>
                                <th>{{ __('admin/app.paid_price') }}</th>
                                <th>{{ __('admin/app.wanted_price') }}</th>
                                <th>{{ __('admin/app.date') }}</th>
                                <th>{{ __('admin/app.time') }}</th>
                                <th>{{ __('admin/app.status') }}</th>
                                <th>{{ __('admin/app.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                            <tr id="row_{{ $row->id }}">
                                <td> {{ $row->id }}  </td>
                                <td> <a href="{{ route('users.show',$row->user->id) }}">{{ $row->user->name }} </a> </td>
                                <td> {{ $row->user->phone }}  </td>
                                <td> {{ $row->offer?$row->offer->name:'' }}  </td>
                                <td> {{ $row->paid_price }}  </td>
                                <td> {{ ($row->offer?$row->offer->price:0)-$row->paid_price }}  </td>
                                <td> {{ $row->date }}  </td>
                                <td> {{ $row->time }}  </td>
                                <td>

                                    <select onchange='changeBookStatus({{ $row->id }},this.value)' class="form-control">
                                        <option value="pending" {{ 'pending'==$row->status?'selected':'' }} >{{ __('admin/app.pending') }}</option>
                                        <option value="accepted" {{ 'accepted'==$row->status?'selected':'' }} >{{ __('admin/app.accepted') }}</option>
                                        <option value="rejected" {{ 'rejected'==$row->status?'selected':'' }} >{{ __('admin/app.rejected') }}</option>
                                        <option value="completed" {{ 'completed'==$row->status?'selected':'' }} >{{ __('admin/app.completed') }}</option>
                                        <option value="canceled" {{ 'canceled'==$row->status?'selected':'' }} >{{ __('admin/app.canceled') }}</option>
                                        <option value="accept_canceled" {{ 'accept_canceled'==$row->status?'selected':'' }} >{{ __('admin/app.accept_canceled') }}</option>
                                    </select>

                                </td>
                                {{-- <td>
                                    <div class="custom-switch custom-switch-primary mb-2">
                                        <input class="custom-switch-input" id="active_{{ $row->id }}" {{ $row->active==1?'checked':'' }} value="{{ $row->active==1?0:1 }}" name="active" type="checkbox">
                                        <label class="custom-switch-btn " onclick="modelActive({{ $row->id }},'books')" ></label>
                                    </div>
                                </td> --}}
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
                                                    <button class="btn btn-primary " onclick="deleteModel({{ $row->id }},'books')">{{ __('admin/app.save') }}</button>
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
                                                    <form  class="tooltip-right-bottom" action="{{route('books.update',$row->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
                                                        @method('PUT')
                                                        @csrf
                                                    <div class="card-body">
                                                            <input type="hidden" name="id" value="{{$row->id}}">

                                                            <div class="form-group has-float-label">
                                                                <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" required>
                                                                    @foreach ($users as $user)
                                                                        <option value="{{ $user->id }}" {{ $row->user_id==$user->id?'selected':'' }}>{{ $user->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('user_id')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group has-float-label">
                                                                <select class="form-control @error('offer_id') is-invalid @enderror" name="offer_id" required>
                                                                    @foreach ($offers as $offer)
                                                                        <option value="{{ $offer->id }}" {{ $row->offer_id==$offer->id?'selected':'' }}>{{ $offer->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('offer_id')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group has-float-label">
                                                                <input class="form-control @error('paid_price') is-invalid @enderror" type="number" placeholder="{{ __('admin/app.paid_price') }}" name="paid_price" value="{{ old('paid_price')?old('paid_price'):$row->paid_price }}" required />
                                                                @error('paid_price')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group has-float-label">
                                                                <input class="form-control @error('date') is-invalid @enderror" placeholder="{{ __('admin/app.date') }}" type="date" name="date" required value="{{ old('date')?old('date'):$row->date }}" />
                                                                @error('date')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group has-float-label">
                                                                <input class="form-control @error('time') is-invalid @enderror" placeholder="{{ __('admin/app.time') }}" type="time" name="time" value="{{ old('time')?old('time'):$row->time }}" required />
                                                                @error('time')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
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
                    <form  class="tooltip-right-bottom" action="{{route('books.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                        <div class="form-group has-float-label">
                            <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id')==$user->id?'selected':'' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group has-float-label">
                            <select class="form-control @error('offer_id') is-invalid @enderror" name="offer_id" required>
                                @foreach ($offers as $offer)
                                    <option value="{{ $offer->id }}" {{ old('offer_id')==$offer->id?'selected':'' }}>{{ $offer->name }}</option>
                                @endforeach
                            </select>
                            @error('offer_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group has-float-label">
                            <input class="form-control @error('paid_price') is-invalid @enderror" placeholder="{{ __('admin/app.paid_price') }}" type="number" name="paid_price" value="{{ old('paid_price') }}" required />
                            @error('paid_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group has-float-label">
                            <input class="form-control @error('date') is-invalid @enderror" placeholder="{{ __('admin/app.date') }}" type="date" name="date" value="{{ old('date') }}" required />
                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group has-float-label">
                            <input class="form-control @error('time') is-invalid @enderror" placeholder="{{ __('admin/app.time') }}" type="time" name="time" value="{{ old('time') }}" required />
                            @error('time')
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

<div class="modal fade" id="CreateUser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CreateUserLabel">{{ __('admin/app.'.$title) }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form  class="tooltip-right-bottom" action="{{route('customers.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
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
                        <input type="hidden" name="type" value="customer">

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
