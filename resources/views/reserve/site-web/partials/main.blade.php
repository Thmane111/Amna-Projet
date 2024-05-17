
 @extends("site-web.index")

@section("content")
    <!-- ======= Featured Services Section ======= -->
    <!-- End Featured Services Section -->

      <!-- ======= About Us Section ======= -->
      <section id="about" class="about pt-0" style="margin-top: 5%;">
    @include('site-web.about')
</section>
      <!-- End About Us Section -->

      <!-- ======= Services Section ======= -->
      <section id="service" class="services pt-0">
       @include('site-web.service')
      </section><!-- End Services Section -->

      <!-- ======= Call To Action Section ======= -->
      <section id="call-to-action" class="call-to-action">
        <div class="container" data-aos="zoom-out">

          <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
              <h3>Call To Action</h3>
              <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <a class="cta-btn" href="#">Call To Action</a>
            </div>
          </div>

        </div>
      </section><!-- End Call To Action Section -->

      <!-- ======= Features Section ======= -->
      <section id="features" class="features"  style="background:  #ffffff;">
        <div class="container" style="background:white;">

          <div class="row gy-4 align-items-center features-item" data-aos="fade-up">

            <div class="col-md-7">
              <img src="{{asset('Site-web/assets/img/az.jpg')}}" style="width: 100%;height:100%;" class="img-fluid" alt="">
            </div>
            <div class="col-md-4" data-aos="zoom-out">
              <h3>Devenez autonome et changez votre carrière</h3>
              <p class="">
                Nous pensons que chacun a droit à une carrière épanouissante et nous voulons vous aider à l'obtenir. C'est pourquoi nous proposons


              </p>
              <ul>
                <li><i class="bi bi-check" ></i> Formation pratique</li>
                <li><i class="bi bi-check"></i> Un Paiement Échelonné</li>
                <li><i class="bi bi-check"></i>Un Mentor</li>
              </ul>
              <a href="" class="btn btn-primary">Postuler</a>
            </div>
          </div><!-- Features Item -->
          <div class="row gy-4 align-items-center features-item" data-aos="fade-up"  style="margin-top: 0px;padding-top:0px;">


            <div class="col-md-4" data-aos="zoom-out">
                <span>
              <h3 style="text-align: initial;justify-content:left;"><i class="fa fa-film" aria-hidden="true"></i>   Qualité garantie
                <p style="font-size: 13px;">Nous ne sacrifions jamais rien en matière de qualité, ni nos formateurs, ni notre contenu. C'est pourquoi nous n'employons que les meilleurs de l'industrie.</p>
            </h3>

                </span>
            <br>
            <span>
                <h3 style="text-align: initial;justify-content:left;"><i class="fa fa-pencil-square" aria-hidden="true"></i>   Mentors expérimentés
                  <p style="font-size: 13px;">Les mentors de Xarala sont des professionnels hautement expérimentés et qui ont fait leurs preuves dans leurs domaines respectifs.</p>
              </h3>

            </span>
            <br>
            <span>
                <h3 style="text-align: initial;justify-content:left;"><i class="fa fa-question-circle" aria-hidden="true"></i>   Formation pratique

                  <p style="font-size: 13px;">Vous apprenez mieux lorsque vous apprenez à appliquer ce que vous avez appris. Grâce à notre système de formation innovant, vous pouvez réaliser des projets, dès la première semaine.</p>
              </h3>

                  </span>




            </div>
            <div class="col-md-7">
                <img src="{{asset('Site-web/assets/img/az1.jpg')}}" style="width: 100%;" class="img-fluid" alt="">
              </div>
          </div><!-- Features Item -->







        </div>
      </section><!-- End Features Section -->



      <!-- ======= Testimonials Section ======= -->
      <section id="testimonials" class="testimonials" style="background:#0e1d34;  background-size: cover;
      background-position: center;background-image: url({{asset('Site-web/assets/img/az2.jpg')}});">
        <div class="container">

          <div class="slides-1 swiper" data-aos="fade-up">
            <div class="swiper-wrapper">

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Saul Goodman</h3>
                  <h4>Ceo &amp; Founder</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Designer</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Jena Karlis</h3>
                  <h4>Store Owner</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                  <h3>Matt Brandon</h3>
                  <h4>Freelancer</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                  <h3>John Larson</h3>
                  <h4>Entrepreneur</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div><!-- End testimonial item -->

            </div>
            <div class="swiper-pagination"></div>
          </div>

        </div>
      </section><!-- End Testimonials Section -->

      <!-- ======= Frequently Asked Questions Section ======= -->

        @endsection
