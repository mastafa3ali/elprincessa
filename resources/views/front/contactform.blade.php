<div class="page-section contact-section" style="background-color: #f2f2f2; padding-bottom: 0; padding-top: 0;">
    <div class="row d-flex flex-wrap">
      <div class="col-md-6 col-12">
        <h3 class="text-center wow fadeInUp pt-4 mb-3 mt-3"> تواصل معانا</h3>
        <img src="{{ asset('front') }}/img/ornament-slider-white-01.png" class="spread-img">
        <form class="main-form">
          <div class="row mt-5 ">
            <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
              <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="الأسم بالكامل">
            </div>
            <div class="col-12 col-sm-6 py-2 wow fadeInRight">
              <input type="email" name="contact_email" id="contact_email" class="form-control" placeholder="الإيميل">
            </div>


            <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
              <input type="text" class="form-control" name="contact_subject" id="contact_subject" placeholder="رقم التليفون">
            </div>
            <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
              <textarea name="contact_msg" id="contact_msg" class="form-control" rows="6" placeholder="الموضوع"></textarea>
            </div>
          </div>

          <button type="button" onclick="submitContactUs()" class="btn btn-primary mt-3 wow zoomIn mb-4 ml-3"> إرسال رسالة </button>
        </form>
      </div>

      <div class="col-md-6 col-12">
        <div class="responsive-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.5141365239574!2d31.329695115115324!3d30.050793881880068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583e600da9a055%3A0x38dfffe282f17af!2sPrincess%20Spa!5e0!3m2!1sen!2seg!4v1649496958323!5m2!1sen!2seg" width="600" height="450" frameborder="0" style="border:0" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         
            </div>
        {{-- <img src="{{ asset('front') }}/img/map.png"/> --}}
      </div>
    </div>
  </div>
