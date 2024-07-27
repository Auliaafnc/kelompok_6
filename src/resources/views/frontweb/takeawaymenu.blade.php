// views/frontweb/takeawaymenu.blade.php
@extends('layouts.index')

@section('content')
<!--  Header Start -->
<div class="page-header-reservasi mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Rakat Resto Take Away menu</h2>
            </div>
            <div class="col-12">
                <a>Jl. Citra Raya Boulevard No.01 BlokS No.25, Panongan, Kec. Panongan, Kabupaten Tangerang, Banten 15711</a>
            </div>
        </div>
    </div>
</div>
<!--  Header End -->

<!-- List Menu Start -->
<div class="menu">
    <div class="container">
        <div class="section-header text-center">
            <p>List Daftar Menu</p>
            <h2>East Indonesian Cuisine</h2>
        </div>

        <!-- Bagian takeaway untuk Makanan -->
        <div class="form-group takeaway-section text-left">
            <label>Makanan Takeaway:</label>
            @foreach($makanan as $item)
            <div id="menu-item-{{ $item->id }}" class="menu-item" data-name="{{ $item->name }}" data-price="{{ $item->price }}">
                <img src="{{ $item->getFirstMediaUrl('image', 'thumb') }}" alt="{{ $item->name }}" />
                <div class="menu-details">
                    <span>{{ $item->name }} (Rp. {{ number_format($item->price, 0, ',', '.') }})</span>
                    <div class="quantity">
                        <button class="minus-btn-takeaway">-</button>
                        <input type="text" value="0" readonly />
                        <button class="plus-btn-takeaway">+</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Bagian takeaway untuk Minuman -->
        <div class="form-group takeaway-section text-left">
            <label>Minuman Takeaway:</label>
            @foreach($minuman as $item)
            <div id="menu-item-{{ $item->id }}" class="menu-item" data-name="{{ $item->name }}" data-price="{{ $item->price }}">
                <img src="{{ $item->getFirstMediaUrl('image', 'thumb') }}" alt="{{ $item->name }}" />
                <div class="menu-details">
                    <span>{{ $item->name }} (Rp. {{ number_format($item->price, 0, ',', '.') }})</span>
                    <div class="quantity">
                        <button class="minus-btn-takeaway">-</button>
                        <input type="text" value="0" readonly />
                        <button class="plus-btn-takeaway">+</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="total-price text-center">
            Total Harga Takeaway: <span id="total-price-takeaway">Rp. 0</span>
        </div>

        <!-- Form untuk mengarahkan ke takeawayform -->
        <form id="takeaway-form" action="{{ route('takeawayform') }}" method="GET">
            <input type="hidden" id="selected-items" name="selected_items" />
            <input type="hidden" id="total-price" name="total_price" />
            <div class="button-container-to">
                <button type="submit" id="confirm-btn-menu-to-form">Pesan Sekarang</button>
            </div>
        </form>
    </div>
</div>
<!-- List Menu End -->
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('takeaway-form');
        const selectedItemsInput = document.getElementById('selected-items');
        const totalPriceInput = document.getElementById('total-price');

        function updateTotalPrice() {
            let totalPrice = 0;
            document.querySelectorAll('.menu-item').forEach(item => {
                const price = parseFloat(item.getAttribute('data-price'));
                const quantity = parseInt(item.querySelector('input').value);
                totalPrice += price * quantity;
            });
            document.getElementById('total-price-takeaway').innerText = 'Rp. ' + totalPrice.toFixed(0);
            return totalPrice;
        }

        form.addEventListener('submit', function(event) {
            const selectedItems = [];
            let totalPrice = updateTotalPrice();

            document.querySelectorAll('.menu-item').forEach(item => {
                const id = item.id.split('-')[2];
                const quantity = item.querySelector('input').value;
                
                if (quantity > 0) {
                    selectedItems.push({ id, quantity });
                }
            });

            if (selectedItems.length > 0) {
                selectedItemsInput.value = JSON.stringify(selectedItems);
                totalPriceInput.value = totalPrice;
            } else {
                event.preventDefault();
                alert('Please select at least one item.');
            }
        });
    });
</script>
@endsection
