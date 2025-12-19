<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePandaRequest;
use App\Http\Requests\UpdatePandaRequest;
use App\Http\Resources\PandaResource;
use App\Models\Panda;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class PandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResource
    {
        $pandas = Panda::query();

        if (!in_array($orderBy = $request->query('orderBy'), [null, 'name', 'age']))
            abort(404);

        if (!in_array($order = $request->query('order'), [null, 'asc', 'desc']))
            abort(404);
        
        if ($orderBy !== null) {

            $order = $order ?? 'asc';
            // Ha kor szerint kell, akkor az adatbazisban a 
            // birth szerint kell, de forditva, mert minnel
            // korabban szuletett valaki, annal idosebb
            if ($orderBy === 'age') {
                $orderBy = 'birth';
                $order = $order === 'asc' ? 'desc' : 'asc';
                $pandas = $pandas->where("birth", "<>", null);
            }
            $pandas = $pandas->orderBy($orderBy, $order);
            return PandaResource::collection($pandas->get());
        }
        else
            return PandaResource::collection(Panda::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePandaRequest $request): JsonResource
    {
        return new PandaResource(Panda::create($request->validated()));
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
        $data = $request->validated();
        $panda->update($data);
        return new PandaResource($panda);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Panda $panda): Response
    {
        return $panda->delete() ? response()->noContent() : abort(500);
    }
}
