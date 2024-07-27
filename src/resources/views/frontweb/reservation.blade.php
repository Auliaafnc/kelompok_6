@extends('layouts.index')
@section('content')
<!-- Header Start -->
<div class="page-header-reservasi mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Rakat Resto Reservation table and menu</h2>
            </div>
            <div class="col-12">
                <a>Jl. Citra Raya Boulevard No.01 BlokS No.25, Panongan, Kec.
                    Panongan, Kabupaten Tangerang, Banten 15711</a>
            </div>
        </div>
    </div>
</div>
<!-- Header End-->

<!-- Form Reservasi Start -->
<div class="container-reservasi">
    <div class="reservation-form">
        <form action="{{ route('reservation.store') }}" method="POST">
            @csrf
            <div class="section-WA text-center">
                <a href="https://wa.me/+6285890655265?text=Ingin%20melakukan%20reservasi%20dengan%20jumlah%20khusus%20(sebutkan-jumlahnya)%20orang"
                    target="_blank">Untuk pemesanan lebih dari 6 orang silahkan melakukan reservasi meja lebih dari 1,
                    jika ada yang perlu ditanyakan silahkan WhatsApp ke nomer ini +6285890655265</a>
            </div>

            <div class="form-group time-slot">
                <label for="start_book">Tanggal & Jam Mulai:</label>
                <input type="text" id="start_book" name="start_book" required />
            </div>
            <div class="form-group">
                <label for="table_id">Pilih Meja:</label>
                <select id="table_id" name="table_id" required>
                    @foreach($tables as $table)
                    <option value="{{ $table->id }}">{{ $table->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group-TA">
                <label for="keterangan_tambahan">Pesan Opsional:</label>
                <input type="text" id="keterangan_tambahan" name="keterangan_tambahan"
                    placeholder="Masukkan Pesan bila ingin adakan acara khusus" />
            </div>

            <div class="section-datadiri text-center">
                <h3>Informasi Data Pemesan</h3>
            </div>
            <div class="form-group">
                <label for="name">Nama Anda:</label>
                <input type="text" id="name" name="name" placeholder="Masukkan Nama Anda" required />
            </div>
            <div class="form-group">
                <label for="phone">Nomor Handphone Anda:</label>
                <input type="text" id="phone" name="phone" placeholder="Masukkan Nomor Handphone Aktif" required />
            </div>

            <div class="form-group">
                <label for="pembayaran">Masukkan Metode Pembayaran:</label>
                <select id="pembayaran" name="pembayaran" required>
                    <option value="" disabled selected>Pilih Jenis Pembayaran</option>
                    <option value="Dompet_Digital">Dompet Digital</option>
                    <option value="Transfer_Bank">ATM Digital</option>
                </select>
            </div>

            <div class="button-container">
                <button type="submit" id="confirm-btn-RSV">Reservasi Sekarang</button>
            </div>
        </form>
    </div>
</div>
@endsection
