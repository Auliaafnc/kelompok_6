<?php

namespace App\Http\Controllers;

use App\Models\Takeaway;
use App\Models\Product;
use Illuminate\Http\Request;

class TakeawayformwebController extends Controller
{
    public function index(Request $request)
    {
        $selectedItems = json_decode($request->input('selected_items'), true);
        $totalPrice = $request->input('total_price');
        
        $products = [];
        foreach ($selectedItems as $item) {
            $product = Product::find($item['id']);
            if ($product) {
                $products[] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $item['quantity']
                ];
            }
        }

        return view('frontweb.takeawayform', [
            'products' => $products,
            'totalPrice' => $totalPrice
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'waktu_takeaway' => 'required|date_format:Y-m-d H:i:s',
            'keterangan_tambahan' => 'nullable|string',
            'pembayaran' => 'required|string',
            'selected_items' => 'required|json',
        ]);

        $takeaway = Takeaway::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'waktu_takeaway' => $data['waktu_takeaway'],
            'keterangan_tambahan' => $data['keterangan_tambahan'],
            'pembayaran' => $data['pembayaran'],
            'status' => 'Takeaway', // Or whatever default status you need
        ]);

        $selectedItems = json_decode($data['selected_items'], true);

        foreach ($selectedItems as $item) {
            $takeaway->products()->attach($item['id'], ['quantity' => $item['quantity']]);
        }

        return response()->json(['success' => true]);
    }
}