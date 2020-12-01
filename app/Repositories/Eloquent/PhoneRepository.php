<?php

namespace App\Repositories\Eloquent;

use App\Http\Requests\PhoneSearchRequest;
use App\Models\Phone;
use App\Repositories\PhoneRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class PhoneRepository extends BaseRepository implements PhoneRepositoryInterface
{

    /**
     * PhoneRepository constructor.
     *
     * @param Phone $model
     */
    public function __construct(Phone $model)
    {
        parent::__construct($model);
    }

    /**
     * Подготавливаем запрос
     *
     * @param PhoneSearchRequest $searchRequest
     * @return array
     */
    protected function prepareSearch(PhoneSearchRequest $searchRequest)
    {
        $result = [];

        if ($searchRequest->get('color')){
            $result['color'] = $searchRequest->get('color');
        }

        if ($searchRequest->get('memory')){
            $result['memory'] = $searchRequest->get('memory');
        }

        return $result;
    }

    /**
     * Получить все модели телефонов, опционально - с поиском по полям предложения.
     *
     * @param PhoneSearchRequest $searchRequest
     * @return Collection
     */
    public function all(PhoneSearchRequest $searchRequest): Collection
    {
        $query = $this->model;
        $searchParams = $this->prepareSearch($searchRequest);

        if ($searchParams) {
            return $query->whereHas('offers', function ($q) use ($searchParams) {
                foreach ($searchParams as $offerParam => $offerValue) {
                    $q->where($offerParam, $offerValue);
                }
            })->get();
        } else {
            return $query->get();
        }

    }
}
