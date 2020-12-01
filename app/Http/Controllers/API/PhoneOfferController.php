<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhoneOfferCreateRequest;
use App\Models\Phone;
use App\Models\PhoneOffer;
use App\Repositories\PhoneOfferRepositoryInterface;

class PhoneOfferController extends Controller
{
    private $phoneOfferRepository;

    public function __construct(PhoneOfferRepositoryInterface $phoneOfferRepository)
    {
        $this->phoneOfferRepository = $phoneOfferRepository;
    }

    public function create(PhoneOfferCreateRequest $request)
    {
        $phone = $this->phoneOfferRepository->create($request->toArray());
        if($phone instanceof PhoneOffer) {
            return response()->json(['message' => 'success']);
        } else {
            return response()->json(['message' => 'failed']);
        }
    }
}
