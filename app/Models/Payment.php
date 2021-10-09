<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function setCardNumberAttribute($card_number)
    {
        $this->attributes['card_number'] = bcrypt($card_number);
    }

    public function setCVCAttribute($cvc)
    {
        $this->attributes['cvc'] = bcrypt($cvc);
    }
}
