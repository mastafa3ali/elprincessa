<div>
    <div class="page-hero bg-image overlay-dark  h-400" style="background-image: url({{ asset('front') }}/img/banner.png">
        <div class="hero-section">
          <div class="container text-center wow zoomIn">
            <h1 class="text-primary">الحجوزات</h1>
            <img src="{{ asset('front') }}/img/ornament-slider-white-01.png" class="spread-img">
        </div>
        </div>
      </div>


      <div class="bg-light my-service-sections">
        @if (session()->has('success'))
        <div class="alert-success princess-msg-success alert" style="padding: 10px;">
            {!! session()->get('success') !!}
        </div>
        @endif
        @if (session()->has('error'))
        <div class="alert-danger princess-msg-danger text-center alert" style="padding: 10px;">
            {!! session()->get('error') !!}
        </div>
        @endif
        <div class="page-section pb-0">
          <div class="">
            <div class="my-offers-container table-container mt-4">
              <table class="table table-striped my-table">
                <thead>
                  <tr>
                    <th class="text-right" style="width : 50%">العرض</th>
                    <th class="text-right">الحالة</th>
                    <th class="text-right">التاريخ</th>
                    <th class="text-right">قيمة العرض</th>
                    <th class="text-right">الإجراء</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                      <td class="text-right">
                        <div class="row d-flex flex-nowrap">
                          <div class="col-md-4 col-4 pr-0 pl-0">
                            <div class="card-item-details-effort my-offer-image overlay-dark"
                              style="background-image: url({{ $item->offer->image[0] }});background-size: 100%;">

                            </div>
                          </div>
                          <div class="col-md-8 col-8 pr-2 pl-2">
                            <h5 class=" text-primary font-weight-bold text-right offer-name">
                              <span href="">{{ $item->offer->name }}</span>
                            </h5>
                            <div class="wrapper-description">
                              <div class="offer-description">

                                <div class="text-right">
                                  <div>{{ $item->offer->description }}</div>
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="text-right">
                        <div class="mr-2 ml-2 text-customize">{{ __('site/app.'.$item->status) }}</div>
                      </td>
                      <td class="text-right">
                        <div class="mr-2 ml-2 text-customize">{{ $item->date }}</div>
                      </td>
                      <td class="text-right">
                        <div class="mr-2 ml-2 text-customize">{{ $item->paid_price }} جنيه مصرى</div>
                      </td>
                      <td class="text-right">
                        <div class="row d-flex ">
                          <button class="mr-1 ml-1 mb-2 btn-action-edit" wire:click.prevent="doShowEdit({{ $item->id }})" title="تعديل">
                            <i class="fa fa-edit"></i>
                          </button>


                          <button class="mr-1 ml-1 mb-2 btn-action-delete" wire:click.prevent="doShow({{ $item->id }})" title="حذف">
                            <i class="fa fa-trash"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> <!-- .bg-light -->




      <div>
        <div class="modal fade @if($showEdit === true) show @endif"
             id="myExampleModal"
             style="display: @if($showEdit === true)
                     block
             @else
                     none
             @endif;"
             tabindex="-1"
             role="dialog"
             aria-labelledby="exampleModalLabeledit"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabeledit">الغاء الحجز</h5>
                        </button>
                    </div>
                    <div class="modal-body text-right">
                        هل أنت متأكد من الغاء الحجز ؟
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary"
                                type="button"
                                wire:click.prevent="doCloseEdit()">اغلاق</button>
                            <input type="hidden" wire:model="row_id">
                        <button class="btn btn-secondary"
                                type="button"
                                wire:click.prevent="cancel()">الغاء الحجز</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Let's also add the backdrop / overlay here -->
        <div class="modal-backdrop fade show"
             id="backdrop"
             style="display: @if($show === true)
                     block
             @else
                     none
             @endif;">
            </div>
    </div>

      <div>
        <div class="modal fade @if($show === true) show @endif"
             id="myExampleModal"
             style="display: @if($show === true)
                     block
             @else
                     none
             @endif;"
             tabindex="-1"
             role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">حذف</h5>
                        </button>
                    </div>
                    <div class="modal-body text-right">هل أنت متأكد حذف هذا الحجز ؟</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary"
                                type="button"
                                wire:click.prevent="doClose()">الغاء</button>
                            <input type="hidden" wire:model="row_id">
                        <button class="btn btn-secondary"
                                type="button"
                                wire:click.prevent="delete()">حذف</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Let's also add the backdrop / overlay here -->
        <div class="modal-backdrop fade show"
             id="backdrop"
             style="display: @if($show === true)
                     block
             @else
                     none
             @endif;">
            </div>
    </div>
    </div>
