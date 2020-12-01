<?php

namespace App\Repositories\Eloquent;

use App\Models\PhoneOffer;
use App\Repositories\PhoneOfferRepositoryInterface;

class PhoneOfferRepository extends BaseRepository implements PhoneOfferRepositoryInterface
{

    /**
     * PhoneOfferRepository constructor.
     *
     * @param PhoneOffer $model
     */
    public function __construct(PhoneOffer $model)
    {
        parent::__construct($model);
    }
}
