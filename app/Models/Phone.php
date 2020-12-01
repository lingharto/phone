<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = ['brand', 'model', 'price', 'year'];

    public static function boot() {
        parent::boot();

        static::deleting(function($phone) {
            $phone->offers()->delete();
        });
    }

    /**
     * Предложения
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function offers()
    {
        return $this->hasMany('App\Models\PhoneOffer');
    }
}
