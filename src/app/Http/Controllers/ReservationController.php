<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index() {
        $tables = Table::all();
        return view('frontweb.reservation', compact('tables'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'start_book' => 'required|date_format:Y-m-d H:i:s',
            'table_id' => 'required|exists:tables,id',
            'keterangan_tambahan' => 'nullable|string|max:255',
            'pembayaran' => 'required|string|in:Dompet_Digital,Transfer_Bank',
        ]);

        $validated['status'] = 'Reservation';

        Reservation::create($validated);

        return redirect()->back()->with('success', 'Reservation created successfully.');
    }
}
