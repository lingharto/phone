<?php
namespace App\Repositories;
use App\Http\Requests\PhoneCreateRequest;
use App\Http\Requests\PhoneSearchRequest;
use App\Models\Phone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface PhoneRepositoryInterface
{
    public function all(PhoneSearchRequest $searchRequest): Collection;

    public function create(array $createRequest): Model;

    public function delete($id): bool;
}
