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

    /**
     * Создание телефона.
     *
     * @OA\Post(
     *     path="/api/phoneOffer/create",
     *     tags={"PhoneOffer"},
     *     summary="Создание предложения телефона.",
     *     description="После запроса будет создано предложение телефона.",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="memory",
     *                     description="Память.",
     *                     type="integer",
     *                     default="32"
     *                 ),
     *                 @OA\Property(
     *                     property="color",
     *                     description="Цвет",
     *                     type="string",
     *                     default="black"
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="JSON c полем 'message', success - все прошло успешно, failed - что-то пошло не так"
     *     )
     * )
     *
     * @param PhoneOfferCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
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
