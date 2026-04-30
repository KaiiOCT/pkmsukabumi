<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;


class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::query();

        // FILTER STATUS
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // FILTER SEARCH
        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                ->orWhere('order_id', 'like', '%' . $search . '%');
            });
        }

        $bookings = $query->latest()->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $booking = Booking::findOrFail($request->id);

        $booking->status = $request->status;
        $booking->save();

        return back()->with('success', 'Status berhasil diupdate');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return back()->with('success', 'Booking berhasil dihapus');
    }
    
}