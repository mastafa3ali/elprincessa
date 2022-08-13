<div>
    <div class="page-hero h-400 bg-image overlay-dark h-400" style="background-image: url({{ asset('front') }}/img/banner.png">
        <div class="hero-section">
          <div class="container text-center wow zoomIn">
            <h1 class="text-primary">صفحتى</h1>
            <img src="{{ asset('front') }}/img/ornament-slider-white-01.png" class="spread-img">
          </div>
        </div>
    </div>



      <div class="page-section my-profile-section" style="background-color: #f2f2f2; padding-bottom: 0; padding-top: 0;">
        <div class="row d-flex flex-wrap">
            @if ($errors->any())
                <div class="alert-success princess-msg-success alert" style="padding: 10px;background:red;color:white">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                        @endforeach
                </div>
                @endif
            @if (session()->has('success'))
            <div class="alert-success princess-msg-success alert" style="padding: 10px;">
                {!! session()->get('success') !!}
            </div>
            @endif
            @if (session()->has('error'))
            <div class="alert-danger princess-msg-danger alert" style="padding: 10px;">
                {!! session()->get('error') !!}
            </div>
            @endif
          <div class="col-md-12 col-12">
            <form class="main-form">
              <div class="row mt-5 ">

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                  <input type="text" wire:model="name" class="form-control @error('description') text-danger @enderror" placeholder="الأسم بالكامل" required>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                  <input type="text" wire:model="phone" class="form-control @error('description') text-danger @enderror" placeholder="الهاتف" required>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                  <input type="password" class="form-control @error('description') text-danger @enderror" wire:model="password" placeholder="كلمة المرور">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                  <input type="password" class="form-control @error('description') text-danger @enderror" wire:model="password_confirmation" placeholder="تأكيد كلمة المرو">
                </div>

              </div>

              <button type="button" class="btn btn-primary mt-3 wow zoomIn mb-4 ml-3" wire:click.prevent="update"> حفظ </button>
            </form>
          </div>

        </div>
      </div> <!-- .page-section -->

</div>
