<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VouchersController extends Controller
{
    //
    public function generateVoucher(Request $request)
    {
        $userId = $request->user()->id;
        $voucherCount = Voucher::where('user_id', $userId)->count();

        if ($voucherCount > 10) {
            return response()->json(['error' => 'Maximum of 10 codes allowed.'], 406);
        }

        $voucher = new Voucher();
        $voucher->code = $voucher->generate();
        $voucher->user_id = $request->user()->id;
        $voucher->save();

        return response()->json(['voucher' => $voucher->code]);
    }
}
