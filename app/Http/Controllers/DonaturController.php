<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DonaturController extends Controller
{
    //
    public function index()
    {
        //
        $donaturs = Donatur::with(['fundraising'])->orderByDesc('id')->paginate(5);
        return view('admin.donaturs.index', compact('donaturs'));
    }

    // fungsi untuk menampilkan detail donatur
    public function show(Donatur $donatur)
    {
        return view('admin.donaturs.show', compact('donatur'));
    }

    // fungsi untuk update detail donatur
    public function update(Request $request, Donatur $donatur)
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
