<?php

namespace App\Http\Controllers;

use App\Models\donatur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DonaturController extends Controller
{
    //
    public function index()
    {
        //
        $donaturs = donatur::with(['fundraising'])->orderByDesc('id')->paginate(5);
        return view('admin.donaturs.index', compact('donaturs'));
    }

    // fungsi untuk menampilkan detail donatur
    public function show(donatur $donatur)
    {
        return view('admin.donaturs.show', compact('donatur'));
    }

    // fungsi untuk update detail donatur
    public function update(Request $request, donatur $donatur)
    {
        DB::transaction(function () use ($donatur) {

            // proses validasi penggalangan donasi
            $donatur->update([
                'is_paid' => true,
            ]);
        });
        return redirect()->route('admin.donaturs.show', $donatur);
    }
}
