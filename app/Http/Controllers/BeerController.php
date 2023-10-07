<?php

namespace App\Http\Controllers;

use App\Services\PunkApi\BeerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, BeerService $beerService): JsonResponse
    {
        $query = $request->all(['per_page', 'page']);

        $beers = $beerService->getAll($query);

        return response()->json([
            'data' => $beers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
