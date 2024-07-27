@extends('layouts.index')
@section('content')
    <!-- Carousel Start -->
    <div class="carousel">
        <div class="container-fluid">
          <div class="owl-carousel">
            <div class="carousel-item">
              <div class="carousel-img">
                <img src="webassets/img/Menu/main menu.jpeg" alt="Image" />
              </div>
              <div class="carousel-text">
                <h1><span>Cita Rasa Masakanan</span> Khas Indonesia Timur</h1>
                <p>
                  Selamat datang di Rakat Resto, tempat kami menghadirkan cita
                  rasa Indonesia timur ke meja Anda. Restoran kami menawarkan
                  pengalaman bersantap yang akan membawa Anda dalam perjalanan
                  kuliner melalui keragaman khas Indonesia timur.
                </p>
              </div>
            </div>
            <div class="carousel-item">
              <div class="carousel-img">
                <img src="webassets/img/Home/pelayanan.jpg" alt="Image" />
              </div>
              <div class="carousel-text">
                <h1>Kemudahan dengan<span> Pemesanan Tercepat!</span></h1>
                <p>
                  Rakat Resto menghadirkan inovasi dalam layanan pemesanan dengan
                  Fastest Order Delivery. Dapatkan makanan berkualitas dengan
                  kecepatan pemesanan yang luar biasa. Nikmati kenyamanan dan
                  kelezatan yang kami tawarkan, kapan saja Anda inginkan!
                </p>
                <!-- <div class="carousel-btn">
                  <a class="btn custom-btn" href="reservation.html"
                    >Reservation</a
                  >
                  <a class="btn custom-btn" href="takeawaymenu.html">Take Away</a>
                   </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Carousel End -->
  
      <!-- About restoran Start -->
      <div class="feature">
        <div class="container">
          <div class="row">
            <div class="col-lg-5">
              <div class="feature-img">
                <img src="webassets/img/Home/luar_resto.jpg" alt="Image" />
              </div>
            </div>
            <div class="col-lg-7">
              <div class="row">
                <div class="col-sm-6">
                  <div class="section-header"></div>
                </div>
                <div class="about-text">
                  <h2>Rakat Resto (east indonesia cuisine)</h2>
                  <p>
                    Rakat Resto adalah keotentikan masakan khas Indonesia Timur
                    dengan cara terbaik melalui menu yang membawa tamu dalam
                    perjalanan rasa melintasi kepulauan Indonesia Timur. Tempat
                    ini dirancang untuk menciptakan nuansa budaya yang kental
                    dengan warisan timur Indonesia yang otentik. Bertempat di
                    dalam taman tropis yang rimbun, Rakat Resto adalah tempat yang
                    sempurna untuk makan dengan intim atau bersantap bersama
                    keluarga dan teman-teman.
                  </p>
                  <a class="btn custom-btn" href="order.html">Pesan Sekarang</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- About restoran  End -->
  
      <!-- Slider gambar restoran Start -->
      <div class="slider-home">
        <div class="container">
          <div class="owl-carousel slider-home-carousel">
            <div class="slider-home-item">
              <div class="slider-home-img">
                <img src="webassets/img/Home/dalam ruangan.jpg" alt="Image" />
              </div>
            </div>
            <div class="slider-home-item">
              <div class="slider-home-img">
                <img src="webassets/img/Home/event.jpg" alt="Image" />
              </div>
            </div>
            <div class="slider-home-item">
              <div class="slider-home-img">
                <img src="webassets/img/Home/bahan baku.jpg" alt="Image" />
              </div>
            </div>
            <div class="slider-home-item">
              <div class="slider-home-img">
                <img src="webassets/img/Home/chep.jpg" alt="Image" />
              </div>
            </div>
            <div class="slider-home-item">
              <div class="slider-home-img">
                <img src="webassets/img/Home/teras.jpg" alt="Image" />
              </div>
            </div>
            <div class="slider-home-item">
              <div class="slider-home-img">
                <img src="webassets/img/Home/tenda.jpg" alt="Image" />
              </div>
            </div>
            <div class="slider-home-item">
              <div class="slider-home-img">
                <img src="webassets/img/Home/luar resto.jpg" alt="Image" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Slider gambar restoran End -->
  
      <!-- Best Seller Menu Start-->
      <div class="menuawalbest-section">
        <div class="container">
          <!-- nah kalau mau pakai halaman akses cepat kemenu makana atau minuman, tapi terdapat kendala, kalau mau aktifkan fitur ini matikan yang atas ya yang udah ada batasannya dan aktifkan css dihalaman: 1057  -->
          <!-- <div class="acs-menu-header text-center">
            <div class="fast-acs">
              <a
                class="menu menu-custom-btn custom-btn1"
                href="menu.html#burgers"
              >
                <i class="flaticon-snack"></i> Daftar Menu Makanan
              </a>
              <div class="menu-title">
                <h2>Best Menu</h2>
              </div>
              <a
                class="menu menu-custom-btn custom-btn2"
                href="menu.html#beverages"
              >
                <i class="flaticon-cocktail"></i> Daftar Menu Minuman
              </a>
            </div>
          </div> -->
  
          <!-- kalau mau off in ini -->
          <div class="section-header text-center">
            <h2>Best Recommended Menu</h2>
            <p>
              Kelezatan dari makanan khas timur, hadir dengan tekstur lembut yang
              mengelilingi lidah seperti pelukan hangat dari hutan tropis.
            </p>
          </div>
          <!-- samapi sini -->
          <div class="menubest-container">
            <div class="menubest-item">
              <div class="img-container">
                <img src="webassets/img/menu/papeda big.jpeg" alt="Papeda Spesial" />
                <div class="overlay">
                  <div class="text">
                    Papeda Spesial, makanan khas dengan tekstur lembut dan cita
                    rasa yang menggugah selera.
                  </div>
                </div>
              </div>
              <h2>Papeda Spesial</h2>
              <span>Rp 20.000</span>
            </div>
            <div class="menubest-item">
              <div class="img-container">
                <img src="webassets/img/menu/kuning big.jpeg" alt="Ikan Kuah Kuning" />
                <div class="overlay">
                  <div class="text">
                    Ikan Kuah Kuning dari repah kunyit dan perpaduan rasa gurih
                    dengan asam yang menyegarkan.
                  </div>
                </div>
              </div>
              <h2>Ikan Kuah Kuning</h2>
              <span>Rp 45.000</span>
            </div>
            <div class="menubest-item">
              <div class="img-container">
                <img src="webassets/img/menu/sunset big.jpeg" alt="Sunset Papua" />
                <div class="overlay">
                  <div class="text">
                    Sunset Papua, minuman segar dengan aroma buah tropis.
                  </div>
                </div>
              </div>
              <h2>Sunset Papua</h2>
              <span>Rp 20.000</span>
            </div>
            <div class="menubest-item">
              <div class="img-container">
                <img src="webassets/img/menu/big brenebon.jpeg" alt="Es Brenebon" />
                <div class="overlay">
                  <div class="text">
                    Es Brenebon, Hidangan sup kacang merah khas Indonesia Timur
                    dengan cita rasa manis
                  </div>
                </div>
              </div>
              <h2>Es Brenebon</h2>
              <span>Rp 35.000</span>
            </div>
          </div>
        </div>
      </div>
      <!-- Best Seller Menu End-->
  
      <!-- Tata Cara Reservasi -->
      <div class="food mt-0">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="food-item">
                <a href="#" id="linkRSV">
                  Tata cara langkah-langkah pemesanan menu dan meja online untuk
                  makan ditempat pada waktu tertentu (Reservasi)
                </a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="food-item">
                <a href="#" id="linkTA">
                  Tata cara langkah-langkah pemesanan untuk dibawa pulang atau
                  dikonsumsi ditempat lain secara online (Take Away)
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Tata Cara Reservasi End -->
  
      <!-- Contact information home  Start -->
      <div class="contact">
        <div class="container">
          <div class="row align-items-center contact-information">
            <div class="col-md-6 col-lg-6">
              <div class="contact-info">
                <div class="contact-icon">
                  <i class="fa fa-map-marker-alt"></i>
                </div>
                <div class="contact-text">
                  <h3>Alamat</h3>
                  <a
                    href="https://maps.app.goo.gl/gNFMm8aPpZ63fM229"
                    target="_blank"
                  >
                    Jl.Boulevard No.01 BlokS No.25, Citra Raya, Kec. Panongan,
                    Kabupaten Tangerang, Banten 15711
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="contact-info">
                <div class="contact-icon">
                  <i class="fa fa-phone-alt"></i>
                </div>
                <div class="contact-text">
                  <h3>Phone</h3>
                  <a href="https://wa.me/+6285890655265" target="_blank">
                    +62 858 906 55265
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="contact-info">
                <div class="contact-icon">
                  <i class="fa fa-envelope"></i>
                </div>
                <div class="contact-text">
                  <h3>Email</h3>
                  <a href="mailto:pmb@esaunggul.ac.id" target="_blank">
                    RakatResto@citra.ac.id
                  </a>
                </div>
              </div>
            </div>
            <div class="maps">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15863.700413075601!2d106.51842183010257!3d-6.273578775046653!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e420768746c45fb%3A0x192fcb02ae7a563f!2sUniversitas%20Esa%20Unggul%20Kampus%20Tangerang!5e0!3m2!1sid!2sid!4v1714090764953!5m2!1sid!2sid"
                width="1080"
                height="250"
                align-items="center"
                justify-content="center"
                style="border: 0"
              ></iframe>
            </div>
          </div>
        </div>
      </div>
@endsection