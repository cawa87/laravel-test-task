<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tx_id', 'balance_id', 'user_id','tx_type', 'description'
    ];

    protected $table = 'user_transaction';

    public const TX_TYPE_TOPUP = 1;
    public const TX_TYPE_TRANSFER = 2;
    public const TX_TYPE_DAILY_FEE = 100;
}
