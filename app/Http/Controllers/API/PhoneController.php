<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhoneCreateRequest;
use App\Http\Requests\PhoneSearchRequest;
use App\Models\Phone;
use App\Repositories\PhoneRepositoryInterface;

class PhoneController extends Controller
{
    private $phoneRepository;

    public function __construct(PhoneRepositoryInterface $phoneRepository)
    {
        $this->phoneRepository = $phoneRepository;
    }

    /**
     * Список всех телефонов с поиском по полям предложений.
     *
     * @OA\Post(
     *     path="/api/phone/index",
     *     tags={"Phone"},
     *     summary="Список всех телефонов с поиском по полям предложений.",
     *     description="После запроса будет получен список всех телефонов, с поиском по полям предложений",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="color",
     *                     description="Цвет телефона.",
     *                     type="string",
     *                     nullable=true,
     *                     default="black"
     *                 ),
     *                 @OA\Property(
     *                     property="memory",
     *                     description="Память телефона.",
     *                     type="integer",
     *                     nullable=true,
     *                     default="32"
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Список телефонов.",
     *         @OA\JsonContent(ref="#/components/schemas/OAPhoneResource")
     *     )
     * )
     *
     * @param PhoneSearchRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(PhoneSearchRequest $request)
    {
        $phones = $this->phoneRepository->all($request);
        return response()->json($phones);
    }

    /**
     * @param PhoneCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(PhoneCreateRequest $request)
    {
        $phone = $this->phoneRepository->create($request->toArray());
        if($phone instanceof Phone) {
            return response()->json(['message' => 'success']);
        } else {
            return response()->json(['message' => 'failed']);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $result = $this->phoneRepository->delete($id);
        return response()->json($result ? ['message' => 'success'] : ['message' => 'failed']);
    }
}
