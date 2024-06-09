<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VouchersController extends Controller
{
    /**
     * Generate voucher for each user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateVoucher(Request $request)
    {
        $userId = $request->user()->id;
        $voucherCount = Voucher::where('user_id', $userId)->count();

        if ($voucherCount > 10) {
            return response()->json(['error' => 'Maximum of 10 codes allowed.'], 406);
        }

        return response()->json(['voucher' => (new Voucher())->createVoucherByUserId($userId)]);
    }
}
