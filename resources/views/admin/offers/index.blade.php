@extends('layouts.admin.master')
@section('content')
<div class="row">
    <div class="col-12">
        <span class="float-right">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
            data-target="#Create">
            {{ __('admin/app.create') }} <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
            @if(auth()->user()->type =='admin')
            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
            data-target="#detect_maximum_offer_on_day">
            {{ __('admin/app.detect_maximum_offer_on_day') }} <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
            @endif
        </span>
        <h1> @if(websiteInfo('maxdaylyOffers')) {{ __('admin/app.maximum_offer_on_day')}} {{   websiteInfo('maxdaylyOffers') }} @endif</h1>
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
                                <th>{{ __('admin/app.created_by') }}</th>
                                <th>{{ __('admin/app.name') }}</th>
                                <th>{{ __('admin/app.price') }}</th>
                                <th>{{ __('admin/app.befor_discount') }}</th>
                                <th>{{ __('admin/app.min_price') }}</th>
                                <th>{{ __('admin/app.photo') }}</th>
                                <th>{{ __('admin/app.short_description') }}</th>
                                <th>{{ __('admin/app.active') }}</th>
                                <th>{{ __('admin/app.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                            <tr id="row_{{ $row->id }}">
                                <td> <a href="{{ route('users.show',$row->user->id) }}">{{ $row->user->name }} </a> </td>
                                <td> <a href="{{ route('offers.show',$row->id) }}">{{ $row->name }} </a> </td>
                                <td> {{ $row->price }}  </td>
                                <td> {{ $row->befor_discount }}  </td>
                                <td> {{ $row->min_price }}  </td>
                                <td>
                                    <div class="row social-image-row gallery">
                                        @foreach ($row->image as $image)
                                        <a href="{{ $image}}">
                                            <img src="{{ $image}}" alt="{{ $row->name }}" class="list-thumbnail border-0">
                                        </a> &nbsp;&nbsp;
                                        @endforeach
                                    </div>
                                </td>
                                <td> {{ $row->short_description }}  </td>

                                <td>
                                    <div class="custom-switch custom-switch-primary mb-2">
                                        <input class="custom-switch-input" id="active_{{ $row->id }}" {{ $row->active==1?'checked':'' }} value="{{ $row->active==1?0:1 }}" name="active" type="checkbox">
                                        <label class="custom-switch-btn " onclick="modelActive({{ $row->id }},'offers')" ></label>
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
                                                    <button class="btn btn-primary " onclick="deleteModel({{ $row->id }},'offers')">{{ __('admin/app.save') }}</button>
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
                                                    <form  class="tooltip-right-bottom" action="{{route('offers.update',$row->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
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
                                                                <input class="form-control @error('befor_discount') is-invalid @enderror" type="number" placeholder="{{ __('admin/app.befor_discount') }}" name="befor_discount" value="{{ old('befor_discount')?old('befor_discount'):$row->befor_discount }}" required />
                                                                @error('befor_discount')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group has-float-label">
                                                                <input class="form-control @error('price') is-invalid @enderror" type="number" placeholder="{{ __('admin/app.price') }}" name="price" value="{{ old('price')?old('price'):$row->price }}" required />
                                                                @error('price')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group has-float-label">
                                                                <input class="form-control @error('min_price') is-invalid @enderror" type="number" placeholder="{{ __('admin/app.min_price') }}" name="min_price" value="{{ old('min_price')?old('min_price'):$row->min_price }}" required />
                                                                @error('min_price')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group has-float-label">
                                                                <textarea class="form-control @error('short_description') is-invalid @enderror" placeholder="{{ __('admin/app.short_description') }}" name="short_description"  >{{ old('short_description')?old('short_description'):$row->short_description }}</textarea>
                                                                @error('short_description')
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
                                                                <input type="file" class="form-control @error('photo') is-invalid @enderror" placeholder="{{ __('admin/app.photo') }}" name="photo[]" multiple="multiple"  />
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
                    <form  class="tooltip-right-bottom" action="{{route('offers.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
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
                            <input class="form-control @error('price') is-invalid @enderror" placeholder="{{ __('admin/app.price') }}" type="number" name="price" value="{{ old('price') }}" required />
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group has-float-label">
                            <input class="form-control @error('befor_discount') is-invalid @enderror" placeholder="{{ __('admin/app.befor_discount') }}" type="number" name="befor_discount" value="{{ old('befor_discount') }}" required />
                            @error('befor_discount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group has-float-label">
                            <input class="form-control @error('min_price') is-invalid @enderror" placeholder="{{ __('admin/app.min_price') }}" name="min_price" value="{{ old('min_price') }}" required />
                            @error('min_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group has-float-label">
                            <textarea class="form-control @error('short_description') is-invalid @enderror" placeholder="{{ __('admin/app.short_description') }}" name="short_description"  >{{ old('short_description') }}</textarea>
                            @error('short_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group has-float-label">
                            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="{{ __('admin/app.description') }}" name="description"  >{{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group has-float-label">
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" placeholder="{{ __('admin/app.photo') }}" name="photo[]" multiple="multiple" required />
                            @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group has-float-label">


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

<div class="modal fade" id="detect_maximum_offer_on_day" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('admin/app.detect_maximum_offer_on_day') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form  class="tooltip-right-bottom" action="{{route('info.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                        <div class="form-group has-float-label">
                            <input class="form-control @error('maxdaylyOffers') is-invalid @enderror" placeholder="{{ __('admin/app.detect_maximum_offer_on_day') }}" name="maxdaylyOffers" value="{{ old('maxdaylyOffers') }}" required />

                            @error('maxdaylyOffers')
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
