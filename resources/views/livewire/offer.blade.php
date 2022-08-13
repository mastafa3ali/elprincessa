<div>
    <div class="row">
        <input type="hidden" name="offer_id" value="{{ $row_id }}">
        <div class="col-md-2 col-12 d-flex align-items-center">
            <div class="form-group">
                <label for="">كامل الدفع</label>
                <input type="radio" class="form-control" wire:model="paid" value="price" checked>
            </div>
        </div>
        <div class="col-md-2 col-12 d-flex align-items-center">
            <div class="form-group">
                <label for="">مقدم</label>
                <input type="radio" class="form-control" wire:model="paid" value="min_price">
            </div>
        </div>
        <div class="col-md-4 col-12 d-flex align-items-center">
            <div class="form-group">
                <label for="">تاريخ الحجز</label>
                <input type="date" class="form-control" wire:model="date" value="{{ date('Y-m-d') }}">
            </div>
        </div>
        <div class="col-md-2 col-12 d-flex align-items-center">
            <button class="btn btn-primary" type="button" wire:click.prevent="book">
                احجز الآن
            </button>
        </div>
    </div>


    <div aria-live="polite" aria-atomic="true" style="position: relative;">
        <div class="toast my-toast @if($book_succss===true) show @endif " style ="position: fixed; top: 0; right: 0;">
        <div class="toast-header alert-success">
            <div class="d-flex align-items-baseline pt-2 pb-2">
            <div>
                <h4 class="ml-2">
                    <i class="fa fa-check-circle fa-check-circle-success"></i>
                </h4>
            </div>
            <div class="mesaage">
                <div class="princess-msg-success">
                <h5 class="text-right"> تم بنجاح</h5>
                <span>تم استلام طلبك رقم</span>
                <span class="mr-1 ml-1">{{ $order_no }}</span>
                <span>يرجى تحويل المبلغ</span>
                <span class="mr-1 ml-1">{{ $transfered }}</span>
                <span> على رقم فودافون كاش</span>
                <span class="mr-1 ml-1">{{ $vodafone }}</span>
            </div>
          </div>
          <button type="button" wire:click.prevent="closeToast" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    </div>

</div>
