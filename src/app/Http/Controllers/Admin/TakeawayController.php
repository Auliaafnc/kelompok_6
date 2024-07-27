<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTakeawayRequest;
use App\Http\Requests\StoreTakeawayRequest;
use App\Http\Requests\UpdateTakeawayRequest;
use App\Models\Takeaway;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TakeawayController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('takeaway_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $takeaways = Takeaway::with(['products'])->get();

        return view('admin.takeaways.index', compact('takeaways'));
    }

    public function create()
    {
        abort_if(Gate::denies('takeaway_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all();

        return view('admin.takeaways.create', compact('products'));
    }

    public function store(StoreTakeawayRequest $request)
    {
        $total = 0;
        $quantities = $request->input('quantities');

        foreach ($quantities as $product_id => $quantity) {
            $product = Product::find($product_id);
            if ($product->stock < $quantity) {
                return redirect()->back()->withErrors(['error' => 'Stock for product ' . $product->name . ' is insufficient.']);
            }
            $total += $product->price * $quantity;
        }

        $takeaway = Takeaway::create($request->all());

        foreach ($quantities as $product_id => $quantity) {
            $takeaway->products()->attach($product_id, ['quantity' => $quantity]);
        }

        $takeaway->update(['total' => $total]);

        // Update table status to 'penuh' if takeawa$takeaway status is 'proses'
        // $table = Table::find($request->table_id);
        // if ($table) {
        //     if ($takeaway->status == 'proses') {
        //         $table->status = 'penuh';
        //         $table->save();
        //     }
        // }

        return redirect()->route('admin.takeaways.index');
    }

    public function edit(Takeaway $takeaway)
    {
        abort_if(Gate::denies('takeaway_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all();

        return view('admin.takeaways.edit', compact('takeaway', 'products'));
    }

    public function update(UpdateTakeawayRequest $request, Takeaway $takeaway)
    {
        $total = 0;
        $quantities = $request->input('quantities');

        foreach ($quantities as $product_id => $quantity) {
            $product = Product::find($product_id);
            if ($product->stock < $quantity) {
                return redirect()->back()->withErrors(['error' => 'Stock for product ' . $product->name . ' is insufficient.']);
            }
            $total += $product->price * $quantity;
        }
        
        $previousStatus = $takeaway->status;

        $takeaway->update($request->all());

        // // Update table status based on takeaw$takeaway status
        // $table = Table::find($takeaway->table_id);
        // if ($table) {
        //     if ($request->status == 'selesai' && $previousStatus != 'selesai') {
        //         $table->status = 'kosong';
        //     } elseif ($request->status == 'proses' && $previousStatus != 'proses') {
        //         $table->status = 'penuh';
        //     }
        //     $table->save();
        // }

        $takeaway->products()->detach();

        foreach ($quantities as $product_id => $quantity) {
            $takeaway->products()->attach($product_id, ['quantity' => $quantity]);
        }

        $takeaway->update(['total' => $total]);

        // Update stock if status is 'selesai'
        if (in_array($takeaway->status, ['selesai'])) {
            $this->adjustProductStock($takeaway);
        }

        return redirect()->route('admin.takeaways.index');
    }

    public function show(Takeaway $takeaway)
    {
        abort_if(Gate::denies('takeaway_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $takeaway->load(['products']);

        return view('admin.takeaways.show', compact('takeaway'));
    }

    public function destroy(Takeaway $takeaway)
    {
        abort_if(Gate::denies('takeaway_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $takeaway->delete();

        return back();
    }

    public function massDestroy(MassDestroyTakeawayRequest $request)
    {
        $takeaways = Takeaway::find(request('ids'));

        foreach ($takeaways as $takeaway) {
            $takeaway->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    private function adjustProductStock(Takeaway $takeaway)
    {
        foreach ($takeaway->products as $product) {
            $quantity = $product->pivot->quantity;
            $product->decrement('stock', $quantity);
        }
    }
}
