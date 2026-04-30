<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // VALIDASI
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'pax' => 'required|integer|min:1'
        ]);

        // GENERATE ORDER ID
        $lastId = Booking::count() + 1;
        $orderId = 'ODN-' . date('ym') . '-' . str_pad($lastId, 3, '0', STR_PAD_LEFT);

        Booking::create([
            'order_id' => $orderId,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'package_name' => $request->package_name,
            'package_price' => $request->package_price,
            'date' => $request->date,
            'pax' => $request->pax,
            'message' => $request->message,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Booking berhasil!');
    }
}
