<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneOffer extends Model
{
    use HasFactory;

    protected $fillable = ['memory', 'color', 'phone_id'];

    /**
     * Телефон
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function phone()
    {
        return $this->belongsTo('App\Models\Phone');
    }
}
