@php
$service=App\Models\service::all();
use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
@include('site-web.partials.head')
</head>

<body>
  <main id="main">
    <!-- ======= Get a Quote Section ======= -->
    <section id="get-a-quote" class="get-a-quote" style="background:  #0e1d34;text-align:center;">
        <a href="/" class="logo d-flex align-items-center" style="text-align:center;justify-content:center;align-items:center;color:white;">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
          <h1>  <center>D-Consulting</center></h1>
          </a>
        <div class="container" data-aos="fade-up">

          <div class="row g-0">

            <div class="col-lg-5 quote-bg" style="background-image: url({{asset('Site-web/assets/img/quote-bg.jpg')}});">
                <div class="text" style="margin-top:15%;">
            <h2>Votre avenir, commence ici</h2>

            <p style="text-align: initial;padding-left:2px;">Vous pourrez vous former à votre rythme avec des horaires flexibles disponibles pour les gens qui travaillent ou ceux qui ont d'autres engagements.</p>
            <ul style="text-align: initial;">
                <li><strong> <i class="bi bi-check"></i>Formation 90% pratique</strong></li>
                <br>
                <li> <strong> <i class="bi bi-check"></i> Accompagnement personnalisé</strong></li>
                <br>
                <li> <strong> <i class="bi bi-check"></i> Accompagnement personnalisé</strong></li>
                <br>
                <li> <strong> <i class="bi bi-check"></i> Accompagnement personnalisé</strong></li>
                <br>
                <li> <strong> <i class="bi bi-check"></i> Accompagnement personnalisé</strong></li>
              </ul>
                </div>
            </div>

            <div class="col-lg-7">
              <form action="forms/quote.php" method="post" class="php-email-form">
                <h3>Souscrire à cette formation</h3>
                <p>Vel nobis odio laboriosam et hic voluptatem. Inventore vitae totam. Rerum repellendus enim linead sero park flows.</p>
                <div class="row gy-4">

                  <div class="col-md-6">
                    <label class="label-control"  style="font-size:12px;">Prenom</label>
                    <input type="text" name="departure" class="form-control" placeholder="Saissisez..." required>
                  </div>

                  <div class="col-md-6">
                    <label class="label-control"  style="font-size:12px;" style="font-size:12px;">Nom</label>
                    <input type="text" name="delivery" class="form-control" placeholder="Saissisez..." required>
                  </div>

                  <div class="col-md-6">
                    <label class="label-control"  style="font-size:12px;">Adresse</label>
                    <input type="text" name="weight" class="form-control" placeholder="Saissisez..." required>
                  </div>

                  <div class="col-md-6">
                    <label class="label-control"  style="font-size:12px;">Téléphone</label>
                    <input type="text" name="dimensions" class="form-control" placeholder="Saissisez..." required>
                  </div>


                  <div class="col-md-6">

                    <label class="label-control"  style="font-size:12px;">Quel est votre Niveau d'étude?</label>
                    <select class="form-control">
                        <option>BFEM</option>
                        <option>Bac</option>
                        <option>Licence</option>
                        <option>professional</option>
                        <option>Sans diplôme</option>
                    </select>

                  </div>

                  <div class="col-md-6">

                    <label class="label-control"  style="font-size:12px;">Comment vous avez connu Xarala?</label>
                    <select class="form-control">
                        <option>Sur les reseau sociaux</option>
                        <option>Via un(e) ami(e)</option>
                        <option>Sur notre site D-tic.com</option>
                        <option>Sur youtube</option>
                        <option>Autre</option>
                    </select>

                  </div>

                  <div class="col-md-6">

                    <label class="label-control"  style="font-size:12px;">Vous habitez où?</label>
                    <input type="text" name="dimensions" class="form-control" placeholder="Saissisez..." required>
                  </div>


                  <div class="col-md-12 text-center">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your quote request has been sent successfully. Thank you!</div>

                    <button type="submit">Get a quote</button>
                  </div>

                </div>
              </form>
            </div><!-- End Quote Form -->

          </div>

        </div>
      </section><!-- End Get a Quote Section -->









          <!-- ======= Frequently Asked Questions Section ======= -->
          <section id="faq" class="faq">
            <div class="container" data-aos="fade-up">

              <div class="section-header">
                <span>Frequently Asked Questions</span>
                <h2>Frequently Asked Questions</h2>

              </div>

              <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-10">

                  <div class="accordion accordion-flush" id="faqlist">

                    <div class="accordion-item">
                      <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                          <i class="bi bi-question-circle question-icon"></i>
                          Non consectetur a erat nam at lectus urna duis?
                        </button>
                      </h3>
                      <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                        <div class="accordion-body">
                            Non, la formation est faire pour tout le monde et nous allons vous guider étape par étape
                        </div>
                      </div>
                    </div><!-- # Faq item-->

                    <div class="accordion-item">
                      <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                          <i class="bi bi-question-circle question-icon"></i>
                          Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?
                        </button>
                      </h3>
                      <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                        <div class="accordion-body">
                          Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                        </div>
                      </div>
                    </div><!-- # Faq item-->

                    <div class="accordion-item">
                      <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                          <i class="bi bi-question-circle question-icon"></i>
                          Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?
                        </button>
                      </h3>
                      <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                        <div class="accordion-body">
                          Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                        </div>
                      </div>
                    </div><!-- # Faq item-->

                    <div class="accordion-item">
                      <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                          <i class="bi bi-question-circle question-icon"></i>
                          Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?
                        </button>
                      </h3>
                      <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                        <div class="accordion-body">
                          <i class="bi bi-question-circle question-icon"></i>
                          Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                        </div>
                      </div>
                    </div><!-- # Faq item-->

                    <div class="accordion-item">
                      <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                          <i class="bi bi-question-circle question-icon"></i>
                          Tempus quam pellentesque nec nam aliquam sem et tortor consequat?
                        </button>
                      </h3>
                      <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                        <div class="accordion-body">
                          Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                        </div>
                      </div>
                    </div><!-- # Faq item-->

                  </div>

                </div>
              </div>

            </div>
          </section><!-- End Frequently Asked Questions Section -->
</main><!-- End #main -->


<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

@include('site-web.partials.js')

</body>

</html>
