<?php

namespace App\Services\PunkApi;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class BeerService extends PunkApiService
{
    /**
     * Returns a collection of beers.
     *
     * @param ?array<string,string> $query
     */
    public function getAll(array $query = []): Collection
    {

        $response = Http::withHeader('Accept', 'application/json')
            ->withQueryParameters($query)
            ->get("{$this->baseURI}/beers");

        return $response->collect();
    }
}
