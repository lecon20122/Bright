  <style>
      .pargraph1 {
          font-size: 23px;
      }

      .names {
          font-size: 30px;

      }
      .par{
        font-size: 25px;
        font-family: :Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif
      }
  </style>
  <!-- our client say -->
  <div class="container-xxl py-5">
      <div class="container">
          <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
              <h1 class="mb-3">!اراء عملائنا</h1>
              <p class="pargraph1">ولأننا هدفنا الأول هو ارضاء ومتابعة عملائنا فأننا نهتم بأن نسمع ارائهم و هذه نبذة من
                  اراء عملائنا عن الموقع الألكتروني وعن الفكرة واقتراحاتهم لخدمات يريدون ان يتضمنها الموقع </p>
          </div>
          <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
              <div class="testimonial-item bg-light rounded p-5">
                  <p class="fs-5 par">اظن فكرة موقع يربط بين الدكاترة والمختصين واهالي أطفال "ذواحتياجات خاصة" فكرة رائعة .</p>
                  <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 40px 0 0 50px;">
                      <img class="img-fluid flex-shrink-0 rounded-circle" src="{{ asset('site/img/c1.jpg') }}"
                          style="width: 100px; height: 100px;">
                      <div class="ps-3">
                          <h4 class=" mb-1  names"> ليلي عاصم</h4>
                          {{-- <span>Profession</span> --}}
                      </div>
                      <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                  </div>
              </div>
              <div class="testimonial-item bg-light rounded p-5">
                  <p class="fs-5 par">شكرا لوجودكم وتقديم مساعدات لأهالي الاطفال المميزة فأن وجودكم يجعلهم يشعرون بالطمانينة والتشجيع </p>
                  <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">
                      <img class="img-fluid flex-shrink-0 rounded-circle" src="{{ asset('site/img/c2.jpg') }}"
                          style="width: 90px; height: 90px;">
                      <div class="ps-3">
                          <h3 class="mb-1 names">مايكل سامي</h3>
                          {{-- <span>Profession</span> --}}
                      </div>
                      <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                  </div>
              </div>
              <div class="testimonial-item bg-light rounded p-5">
                  <p class="fs-5">الموقع يتميز بالسهولة في الأستخدام وتقديم مختلف المعلومات والخدمات بطريقه مناسبة شكرا لخدماتكم </p>
                  <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">
                      <img class="img-fluid flex-shrink-0 rounded-circle" src="{{ asset('site/img/c3.jpg') }}"
                          style="width: 90px; height: 90px;">
                      <div class="ps-3">
                          <h3 class="mb-1">ديما قاسم</h3>
                          {{-- <span>Profession</span> --}}
                      </div>
                      <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Testimonial End -->
