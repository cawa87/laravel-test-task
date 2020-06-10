<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class  UserBalance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id'
    ];

    protected $table = 'user_balance';


    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'balance_id')->orWhere('user_id','=',$this->user_id);
    }


    public function incrTransactions()
    {
        return $this->hasMany('App\Models\Transaction', 'balance_id')
            ->where('tx_type', Transaction::TX_TYPE_TOPUP)
            ->orWhere('user_id','=',$this->user_id)
            ;
    }

    public function incrBalance()
    {
        return array_sum($this->incrTransactions()->pluck('amount')->toArray());
    }

    public function decrTransactions()
    {
        return $this->hasMany('App\Models\Transaction', 'balance_id')
            ->where('tx_type', Transaction::TX_TYPE_TRANSFER)
            ->orWhere('tx_type', Transaction::TX_TYPE_DAILY_FEE);
    }

    public function decrBalance()
    {
        return array_sum($this->decrTransactions()->pluck('amount')->toArray());
    }


    public function currentBalance()
    {
        return $this->incrBalance() - $this->decrBalance();
    }
}
