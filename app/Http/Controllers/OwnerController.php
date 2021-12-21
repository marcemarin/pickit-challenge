<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOwnerRequest;
use App\Http\Requests\UpdateOwnerRequest;
use App\Http\Resources\OwnerResourse;
use App\Models\Owner;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OwnerResourse::collection(Owner::with('cars')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOwnerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOwnerRequest $request)
    {
        $owner = Owner::create($request->validated());

        return new OwnerResourse($owner);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show($ownerId)
    {
        try {
            $owner = Owner::findOrFail($ownerId);

            return new OwnerResourse($owner);
        } catch (ModelNotFoundException $th) {
            return $this->returnError('Owner not found', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOwnerRequest  $request
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOwnerRequest $request, $ownerId)
    {
        try {
            $owner = Owner::findOrFail($ownerId);

            $owner->update($request->validated());

            return new OwnerResourse($owner);
        } catch (ModelNotFoundException $th) {
            return $this->returnError('Owner not found', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy($ownerId)
    {
        try {
            $owner = Owner::findOrFail($ownerId);

            $owner->delete();

            return $this->returnSuccess();
        } catch (ModelNotFoundException $th) {
            return $this->returnError('Owner not found', 404);
        }
    }
}
