<!-- views/frontweb/takeawayform.blade.php -->
@extends('layouts.index')

@section('content')
<!--  Header Start -->
<div class="page-header-reservasi mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Rakat Resto Take Away Form</h2>
            </div>
            <div class="col-12">
                <a>Harap isi detail data diri anda sesuai untuk melakukan pemesanan secara online</a>
            </div>
        </div>
    </div>
</div>
<!--  Header End -->

<!-- Form Isi Data Pemesanan -->
<div class="container-takeaway">
    <div class="takeaway-form">
        <div class="section-datadiriTA text-center">
            <h3>Informasi Data Pemesan</h3>
        </div>
        <div class="form-group-TA">
            <label for="name-input">Nama Anda:</label>
            <input type="text" id="name-input" placeholder="Masukkan Nama Anda" />
        </div>
        <div class="form-group-TA">
            <label for="telp-input">Nomor Handphone Anda:</label>
            <input type="text" id="telp-input" placeholder="Masukkan Nomor Handphone Aktif" />
        </div>
        <div class="form-group-TA time-slot-TA">
            <label>Jam Pengambilan:</label>
            <input type="text" id="start_book" name="start_book" required />
        </div>
        <div class="section-header text-center">
            <a>Mohon datang 5 menit lebih awal sesuai dengan jam pengambilan yang anda pilih untuk melakukan pick-up pesanan</a>
        </div>
        <div class="form-group-TA">
            <label for="pesan-input">Pesan Tambahan:</label>
            <input type="text" id="pesan-input" placeholder="Masukkan Pesan (Opsional)" />
        </div>
        <div class="form-group">
            <label for="additional-payment">Masukkan Metode Pembayaran:</label>
            <select id="additional-payment">
                <option value="" disabled selected>Pilih Jenis Pembayaran</option>
                <option value="Dompet-Digital">Dompet Digital</option>
                <option value="Banking">ATM Digital</option>
            </select>
        </div>
        <div class="section-header text-center">
            <button type="submit" id="confirm-btn-TA">Konfirmasi Detail Pemesanan</button>
        </div>
        <div class="section-header text-center">
            <h3>Ringkasan Pesanan:</h3>
            <ul id="order-items-list">
                @foreach($products as $product)
                    <li>{{ $product['name'] }} (Rp. {{ number_format($product['price'], 0, ',', '.') }}) - Quantity: {{ $product['quantity'] }}</li>
                @endforeach
            </ul>
            <div>Total Harga: <span id="order-total-price">Rp. {{ number_format($totalPrice, 0, ',', '.') }}</span></div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('confirm-btn-TA').addEventListener('click', function() {
            const name = document.getElementById('name-input').value;
            const phone = document.getElementById('telp-input').value;
            const waktu_takeaway = document.getElementById('start_book').value;
            const keterangan_tambahan = document.getElementById('pesan-input').value;
            const pembayaran = document.getElementById('additional-payment').value;

            if (!name || !phone || !waktu_takeaway || !pembayaran) {
                alert('Harap lengkapi semua field!');
                return;
            }

            const formData = {
                name,
                phone,
                waktu_takeaway,
                keterangan_tambahan,
                pembayaran,
                selected_items: JSON.stringify({!! json_encode($products) !!}),
                total_price: {{ $totalPrice }}
            };

            fetch('{{ route('takeaway.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': '{{ csrf_token() }}'
                },
                body: JSON.stringify(formData)
            }).then(response => response.json())
              .then(data => {
                  if (data.success) {
                      window.location.href = '/thank-you'; // Redirect to a thank you page or order confirmation page
                  } else {
                      alert('Terjadi kesalahan, coba lagi.');
                  }
              });
        });
    });
</script>
@endsection
