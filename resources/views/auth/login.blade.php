@extends('auth.app')
@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-2">
                <h2 class="heading-section text-primary">تسجيل الدخول</h2>
            </div>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-6 col-lg-6">
                <div class="login-wrap py-5">
                    @include('message')
              <div class="img d-flex align-items-center justify-content-center" style="background-image: url({{ websiteInfo('logo') }});"></div>
              <h3 class="text-center mb-lg-3">اهلا بك</h3>
                <form method="POST" class="login-form" action="{{ route('login') }}">
                            @csrf
                  <div class="form-group">
                      <div class="icon d-flex align-items-center justify-content-center text-primary"><span class="fa fa-user"></span></div>
                      <input type="text" class="form-control  @error('phone') text-danger @enderror"  type="phone" name="phone" value="{{ old('phone') }}"  required placeholder="رقم الهاتف"  required="">
                  </div>
            <div class="form-group">
                <div class="icon d-flex align-items-center justify-content-center text-primary"><span class="fa fa-lock"></span></div>
              <input type="password" name="password" class="form-control" placeholder="كلمة مرور" required="">
            </div>

            <div class="form-group">
                <button type="submit" class="btn form-control btn-primary rounded submit px-3">دخول</button>
            </div>
          </form>
          <div class="w-100 text-center mt-4 text">
              <p class="mb-0">ليس لديك حساب ؟</p>
              <a href="{{ route('register') }}">قم بإنشاء حساب</a>
          </div>
        </div>
            </div>
        </div>
    </div>
</section>


@endsection
