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
              <div class="img d-flex align-items-center justify-content-center" style="background-image: url({{ websiteInfo('logo') }});"></div>
              <x-auth-validation-errors class="mb-4" :errors="$errors" />
              <h3 class="text-center mb-lg-3">اهلا بك</h3>
                <form method="POST" class="login-form" action="{{ route('register') }}">
                            @csrf
                  <div class="form-group">
                      <div class="icon d-flex align-items-center justify-content-center text-primary"><span class="fa fa-user"></span></div>
                      <input type="text" class="form-control  @error('name') text-danger @enderror"  type="text" name="name" value="{{ old('name') }}"  required placeholder="الاسم"  required="">
                  </div>
                  <div class="form-group">
                      <div class="icon d-flex align-items-center justify-content-center text-primary"><span class="fa fa-user"></span></div>
                      <input type="text" class="form-control  @error('phone') text-danger @enderror"  type="text" name="phone" value="{{ old('phone') }}"  required placeholder="رقم التليفون"  required="">
                  </div>
                  {{-- <div class="form-group">
                      <div class="icon d-flex align-items-center justify-content-center text-primary"><span class="fa fa-user"></span></div>
                      <input type="text" class="form-control  @error('email') text-danger @enderror"  type="email" name="email" value="{{ old('email') }}"  required placeholder="الايميل"  required="">
                  </div> --}}
                <div class="form-group">
                    <div class="icon d-flex align-items-center justify-content-center text-primary"><span class="fa fa-lock"></span></div>
                <input type="password" name="password" class="form-control" placeholder="كلمة المرور" required="">
                </div>
                <div class="form-group">
                    <div class="icon d-flex align-items-center justify-content-center text-primary"><span class="fa fa-lock"></span></div>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="تاكيد كلمة المرور" required="">
                    </div>

            <div class="form-group">
                <button type="submit" class="btn form-control btn-primary rounded submit px-3">تسجيل</button>
            </div>
          </form>
          <div class="w-100 text-center mt-4 text">
              <p class="mb-0"> لديك حساب ؟</p>
              <a href="{{ route('login') }}">تسجيل</a>
          </div>
        </div>
            </div>
        </div>
    </div>
</section>

@endsection
