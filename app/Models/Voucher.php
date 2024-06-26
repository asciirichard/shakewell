<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'code'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Create a voucher entry in the database
     * @param $userId
     * @return Voucher
     */
    public function createVoucherByUserId($userId): Voucher
    {
        return Voucher::create([
            'user_id' => $userId,
            'code' => $this->generateVoucher(),
        ]);
    }

    /**
     * Generates the alphanumeric voucher code, length defaults to 5
     * @param $length
     * @return string
     */
    public function generateVoucher($length = 5): string
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
