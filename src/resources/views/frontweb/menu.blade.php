@extends('layouts.index')
@section('content')
        <!-- Header Start -->
        <div class="page-header-menu mb-0">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <h2>Daftar List Menu</h2>
              </div>
            </div>
          </div>
        </div>
        <!--  Header End -->
    
        <!-- Best Seller Menu Start-->
        <div class="menuawalbest-section">
          <div class="container">
            <div class="section-header text-center">
              <h2>Best Recommended Menu</h2>
              <p>
                Kelezatan dari makanan khas timur, hadir dengan tekstur lembut yang
                mengelilingi lidah seperti pelukan hangat dari hutan tropis.
              </p>
            </div>
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
                <span>Rp 45.000</span>
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
                <span>Rp 50.000</span>
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
                <span>Rp 30.000</span>
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
                <span>Rp 22.000</span>
              </div>
            </div>
          </div>
        </div>
        <!-- Best Seller Menu End-->
    
        <!-- List Menu Start -->
        <div class="menu">
          <div class="container">
            <div class="section-header text-center">
              <p>List Daftar Menu</p>
              <h2>East Indonesian Cuisine</h2>
            </div>
            <div class="menu-tab">
              <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="pill" href="#burgers"
                    >Makanan</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="pill" href="#beverages"
                    >Minuman</a
                  >
                </li>
              </ul>
    
              <!-- bagian list makanan -->
              <div class="tab-content">
                <div id="burgers" class="container tab-pane active">
                  <div class="row">
                    <div class="col-lg-7 col-md-12">
                      <div class="menulist-item">
                        <div class="menulist-img">
                          <img src="webassets/img/menu/papeda sma;;.jpeg" alt="Image" />
                        </div>
                        <div class="menu-text">
                          <h3>
                            <span>Papeda Spesial</span><strong>Rp.45.000</strong>
                          </h3>
                          <p>Terbuat dari sagu yang berkualitas tinggi</p>
                        </div>
                      </div>
                      <div class="menulist-item">
                        <div class="menulist-img">
                          <img src="webassets/img/menu/kuningsmall.jpeg" alt="Image" />
                        </div>
                        <div class="menu-text">
                          <h3>
                            <span>Ikan Kuah Kuning</span><strong>Rp.50.000</strong>
                          </h3>
                          <p>
                            Sajian khas Maluku dengan bahan utama ikan tongkol
                            dengan kuah kuning dari kunyit alami.
                          </p>
                        </div>
                      </div>
                      <div class="menulist-item">
                        <div class="menulist-img">
                          <img src="webassets/img/menu/rica.jpeg" alt="Image" />
                        </div>
                        <div class="menu-text">
                          <h3>
                            <span>Ikan Bakar Rica Rica</span
                            ><strong>Rp.55.000</strong>
                          </h3>
                          <p>
                            Makanan yang terbuat dari ikan yang dimasak bersama
                            rempah-rempah seperti daun jeruk, sereh, jahe, kemiri,
                            dan menggunakan cabe rawit
                          </p>
                        </div>
                      </div>
                      <div class="menulist-item">
                        <div class="menulist-img">
                          <img src="webassets/img/menu/cotooo.jpeg" alt="Image" />
                        </div>
                        <div class="menu-text">
                          <h3>
                            <span>coto makasar</span><strong>Rp.40.000</strong>
                          </h3>
                          <p>
                            Terbuat dari jeroan sapi dengan kuah soto yang segar dan
                            ber rempah tinggi khas timur.
                          </p>
                        </div>
                      </div>
                      <div class="menulist-item">
                        <div class="menulist-img">
                          <img src="webassets/img/menu/gohu.jpeg" alt="Image" />
                        </div>
                        <div class="menu-text">
                          <h3><span>Gohu Ikan</span><strong>Rp.35.000</strong></h3>
                          <p>
                            Makanan khas Ternate yang terbuat dari tuna berkulitas
                            tinggi dan ditaburi dengan bumbu yang sengat lezat dan
                            segar
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block">
                      <img src="webassets/img/menu/papeda big.jpeg" alt="Image" />
                    </div>
                  </div>
                </div>
    
                <!-- bagian list minuman -->
                <div id="beverages" class="container tab-pane fade">
                  <div class="row">
                    <div class="col-lg-7 col-md-12">
                      <div class="menulist-item">
                        <div class="menulist-img">
                          <img src="webassets/img/menu/flores.jpeg" alt="Image" />
                        </div>
                        <div class="menu-text">
                          <h3>
                            <span>Kopi Flores</span><strong>Rp. 25.000</strong>
                          </h3>
                          <p>
                            Mempunyai aroma bunga dan memiliki rasa manis dengan
                            sensasi kacang-kacangan
                          </p>
                        </div>
                      </div>
                      <div class="menulist-item">
                        <div class="menulist-img">
                          <img src="webassets/img/menu/talua.jpeg" alt="Image" />
                        </div>
                        <div class="menu-text">
                          <h3><span>Teh talua</span><strong>Rp. 20.000</strong></h3>
                          <p>
                            Terbuat dari teh dengan tambahan gula dan telur yang
                            sudah dikocok serta sedikit perasan jeruk nipis
                          </p>
                        </div>
                      </div>
                      <div class="menulist-item">
                        <div class="menulist-img">
                          <img src="webassets/img/menu/brenebon small.jpeg" alt="Image" />
                        </div>
                        <div class="menu-text">
                          <h3>
                            <span>Es brenebon</span><strong>Rp. 22.000</strong>
                          </h3>
                          <p>
                            Hidangan sup kacang merah khas Indonesia Timur dengan
                            cita rasa manis
                          </p>
                        </div>
                      </div>
                      <div class="menulist-item">
                        <div class="menulist-img">
                          <img src="webassets/img/menu/sarabba.jpeg" alt="Image" />
                        </div>
                        <div class="menu-text">
                          <h3><span>Sarabba</span><strong>Rp. 25.000</strong></h3>
                          <p>
                            Minuman dengan sari jahe dan rempah yang dicampur dengan
                            susu berkualitas
                          </p>
                        </div>
                      </div>
                      <div class="menulist-item">
                        <div class="menulist-img">
                          <img src="webassets/img/menu/sunsnall.jpeg" alt="Image" />
                        </div>
                        <div class="menu-text">
                          <h3>
                            <span>Sunset Papua</span><strong>Rp. 30.000</strong>
                          </h3>
                          <p>
                            Terbuat dari sari buah jeruk,sayuran wortel, madu alami,
                            dan kadang-kadang tambahan rempah-rempah lokal.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block">
                      <img src="webassets/img/menu/big brenebon.jpeg" alt="Image" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- list Menu End -->
    
        <!-- pilihan pemesanan Start -->
        <div class="food mt-0">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="food-item">
                  <i class="far fa-calendar-alt"></i>
                  <h2>Reservation</h2>
                  <p>
                    Jika anda ingin memesan menu dan meja direstoran untuk makan
                    ditempat pada waktu tertentu
                  </p>
                  <a href="reservation.html">Reservasi sekarang</a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="food-item">
                  <i class="flaticon-courier"></i>
                  <h2>Take away</h2>
                  <p>
                    Jika anda ingin memesan untuk dibawa pulang atau dikonsumsi
                    ditempat lain
                  </p>
                  <a href="takeawaymenu.html">Bungkus sekarang</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Contact information Start -->
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
            </div>
          </div>
        </div>
        <!-- contach informastion End -->
@endsection