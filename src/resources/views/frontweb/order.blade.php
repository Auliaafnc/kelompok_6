@extends('layouts.index')
@section('content')
        <!--  Header Start -->
        <div class="page-header-reservasi mb-0">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <h2>Rakat Resto Pemesanan Online Reservasi & Take Away</h2>
              </div>
            </div>
          </div>
        </div>
        <!--  Header End -->
    
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
                  <a href="/reservation">Reservasi sekarang</a>
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
                  <a href="/takeawaymenu">Bungkus sekarang</a>
                </div>
              </div>
    
              <!-- kalau dipakai invoice aktifkan fitur ini -->
    
              <div class="item-send-container">
                <div class="item-send">
                  <div class="item-img-container">
                    <a href="#" id="linkRSV">
                      <img src="img/Service/reservation.png" alt="reservation" />
                      <span>(Langkah Reservasi)</span>
                    </a>
                  </div>
                </div>
                <div class="item-ketsend">
                  <h2>Kebijakan Pemesanan Reservasi Online</h2>
                  <p>
                    Reservasi di Rakat Resto memerlukan minimum pemesanan 2 item
                    makanan dan 2 item minuman. Pelanggan harus membayar 50% dari
                    total tagihan sebagai uang muka untuk mengamankan reservasi.
                    Jika reservasi dibatalkan, uang muka akan hangus. Konfirmasi
                    reservasi akan dikirim melalui WhatsApp ke nomor yang diberikan,
                    dan semua data reservasi harus diisi dengan benar untuk
                    menghindari pembatalan.
                  </p>
                </div>
              </div>
              <div class="item-send-container">
                <div class="item-ketsend">
                  <h2>Kebijakan Pemesanan Takeaway Online</h2>
                  <p>
                    Pemesanan takeaway di Rakat Resto memerlukan minimal 1 item
                    makanan atau minuman. Pelanggan harus membayar penuh sebelum
                    pengambilan pesanan, dan jika dibatalkan, semua pembayaran akan
                    hangus. Pesanan harus diambil sesuai jadwal yang ditentukan, dan
                    konfirmasi akan dikirim melalui WhatsApp. Semua data pemesanan
                    harus diisi dengan benar, karena pesanan dapat dibatalkan jika
                    informasi tidak valid.
                  </p>
                </div>
                <div class="item-send">
                  <div class="item-img-container">
                    <a href="#" id="linkTA">
                      <img src="img/Service/take-away.png" alt="Takeawat" />
                      <span>Langkah Takeaway</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- pilihan pemesanan End -->
    
        <!-- kontak informasi start -->
        <div class="contact">
          <div class="container">
            <div class="row align-items-center contact-information">
              <div class="contact-text text-center">
                <h3>
                  hubungi bantuan dibawah ini jika anda mengalami kesulitan dalam
                  pemesanan
                </h3>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="contact-info">
                  <div class="contact-icon">
                    <i class="fa fa-phone-alt"></i>
                  </div>
                  <div class="contact-text">
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
                    <a href="mailto:pmb@esaunggul.ac.id" target="_blank">
                      RakatResto@citra.ac.id
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="contact-info">
                  <div class="contact-icon">
                    <i class="fab fa-twitter"></i>
                  </div>
                  <div class="contact-text">
                    <a
                      href="https://x.com/i/flow/login?redirect_after_login=%2FUnivEsaUnggul"
                      target="_blank"
                    >
                      RakatRestoran
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="contact-info">
                  <div class="contact-icon">
                    <i class="fab fa-instagram"></i>
                  </div>
                  <div class="contact-text">
                    <a
                      href="https://www.instagram.com/univ.esaunggul_tangerang/"
                      target="_blank"
                    >
                      RakatResto.Citraraya
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- kontak informasi end -->
@endsection