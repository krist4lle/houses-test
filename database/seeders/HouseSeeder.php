<?php

namespace Database\Seeders;

use App\Models\House;
use Illuminate\Database\Seeder;

class HouseSeeder extends Seeder
{
    /**
     * Add houses names regarding task.
     *
     * @var array|string[]
     */
    private array $names = [
        'The Victoria',
        'The Xavier',
        'The Como',
        'The Aspen',
        'The Lucretia',
        'The Toorak',
        'The Skyscape',
        'The Clifton',
        'The Geneva',
    ];

    /**
     * Add houses prices regarding task.
     *
     * @var array|int[]
     */
    private array $prices = [
      374662,
      513268,
      454990,
      384356,
      572002,
      521951,
      263604,
      386103,
      390600,
    ];

    /**
     * Add houses bedrooms regarding task.
     *
     * @var array|int[]
     */
    private array $bedrooms = [4, 4, 4, 4, 4, 5, 3, 3, 4];

    /**
     * Add houses bathrooms regarding task.
     *
     * @var array|int[]
     */
    private array $bathrooms = [2, 2, 3, 2, 3, 2, 3, 2, 3];

    /**
     * Add houses storeys regarding task.
     *
     * @var array|int[]
     */
    private array $storeys = [2, 1, 2, 2, 2, 1, 2, 1, 2];

    /**
     * Add houses garages regarding task.
     *
     * @var array|int[]
     */
    private array $garages = [2, 2, 3, 2, 2, 2, 2, 1, 2];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 9; $i++) {
            $this->create($i);
        }
    }

    /**
     * Create and save house to database by array index.
     *
     * @param int $i array index.
     * @return void
     */
    private function create(int $i): void
    {
        $house = new House();
        $house->name = $this->names[$i];
        $house->price = $this->prices[$i];
        $house->bedrooms = $this->bedrooms[$i];
        $house->bathrooms = $this->bathrooms[$i];
        $house->storeys = $this->storeys[$i];
        $house->garages = $this->garages[$i];
        $house->save();
    }
}
