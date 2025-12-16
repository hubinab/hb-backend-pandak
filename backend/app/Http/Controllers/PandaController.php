<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePandaRequest;
use App\Http\Requests\UpdatePandaRequest;
use App\Http\Resources\PandaResource;
use App\Models\Panda;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceResponse;
use Illuminate\Http\Response;

class PandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResource
    {
        $pandas = Panda::all();
        return PandaResource::collection($pandas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePandaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Panda $panda): JsonResource
    {
        return new PandaResource($panda);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePandaRequest $request, Panda $panda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Panda $panda): Response
    {
        return $panda->delete() ? response()->noContent() : abort(500);
    }
}
