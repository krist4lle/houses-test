<?php

namespace App\Http\Controllers;

use App\Http\Requests\HouseSearchRequest;
use App\Http\Resources\HouseResource;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function search(HouseSearchRequest $request, HouseService $service)
    {
        $searchParams = $request->validated();
        $houses = $service->searchResult($searchParams);

        return HouseResource::collection($houses);
    }
}
