<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class  DayliFee extends Model
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
        return $this->hasMany('App\Models\Transaction','balance_id');
    }
}
