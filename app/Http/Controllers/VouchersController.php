<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VouchersController extends Controller
{
    //
    public function generateVoucher($userId)
    {
        $voucher = (new Voucher)->generate($userId);
    }
}
