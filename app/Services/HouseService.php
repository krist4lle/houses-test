<?php

namespace App\Services;

use App\Models\House;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Collection;

class HouseService
{
    /**
     * Lower price variable for search query. By default, set 0.
     *
     * @var int
     */
    private int $lowPrice = 0;

    /**
     * Higher price variable for search query. By default, set PHP maximum value.
     *
     * @var int
     * @return Collection
     */
    private int $highPrice = PHP_INT_MAX;

    public function searchResult(array $params): Collection
    {
        $houses = House::query(); // Create a query builder instance.
        $houses = $this->getQuery($houses, $params);

        return $houses->get();
    }

    /**
     * Take provided parameters to create a search query.
     *
     * @param Builder $houses
     * @param array $params
     * @return Builder
     */
    private function getQuery(Builder $houses, array $params): Builder
    {
        if (!empty($params['name'])) {
            $name = '%' . $params['name'] . '%';
            $houses = $houses->where('name', 'like', $name);
        }

        $houses = $this->checkHousesPremises($params, 'bedrooms', $houses);
        $houses = $this->checkHousesPremises($params, 'bathrooms', $houses);
        $houses = $this->checkHousesPremises($params, 'storeys', $houses);
        $houses =  $this->checkHousesPremises($params, 'garages', $houses);

        $this->identifyPriceRange($params);
        $houses = $houses->whereBetween('price', [$this->lowPrice, $this->highPrice]);

        return$houses;
    }

    /**
     * Check if houses premises are provided and add them to search query.
     *
     * @param array $params
     * @param string $room
     * @param $houses
     * @return Builder
     */
    private function checkHousesPremises(array $params, string $premises, Builder $houses)
    {
        return !empty($params[$premises]) ? $houses->where($premises, '=', $params[$premises]) : $houses;
    }

    /**
     * Get prices to identify search range if provided, otherwise use default values.
     *
     * @param array $params
     * @return void
     */
    private function identifyPriceRange(array $params): void
    {
        if (!empty($params['lowPrice'])) {
            $this->lowPrice = $params['lowPrice'];
        }
        if (!empty($params['highPrice'])) {
            $this->highPrice = $params['highPrice'];
        }
    }
}
