<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    public function generate($length = 5): string
    {
        $string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $stringLength = strlen($string);
        $voucher = '';

        for ($i = 0; $i < $length; $i++) {
            $voucher .= $string[rand(0, $stringLength - 1)];
        }

        return $voucher;
    }

}
